<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CustomerStore;
use App\Http\Requests\Frontend\CustomerUpdate;
use App\model\ListUtil;

class CustomerController extends Controller
{
    /**
     * Show data from model.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getCustomer()
    {
        $Customers = Customer::All();

        $data = $alldata = json_decode($Customers);

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);
  
        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
            ? $datatable['query']['generalSearch'] : '';
        if ( ! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });
            unset($datatable['query']['generalSearch']);
        }
  
        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;
        if (is_array($query)) {
            $query = array_filter($query);
            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }
  
        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';
  
        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;
  
        $pages = 1;
        $total = count($data);
  
        usort($data, function ($a, $b) use ($sort, $field) {
            if ( ! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }
  
            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }
  
            return $a->$field < $b->$field ? true : false;
        });
  
        if ($perpage > 0) {
            $pages  = ceil($total / $perpage); 
            $page   = max($page, 1); 
            $page   = min($page, $pages); 
            $offset = ($page - 1) * $perpage;
            if ($offset < 0) {
                $offset = 0;
            }
  
            $data = array_slice($data, $offset, $perpage, true);
        }
  
        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];
  
  
        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }
  
  
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
  
        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];
  
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStore $request)
    {
        $Customer = Customer::create([
            'name' => $request->name,
        ]);
        return response()->json($Customer);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $Customers = Customer::find($customer);
        return view('frontend.customer.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $Customers = Customer::find($customer);
        return response()->json($Customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdate $request, Customer $customer)
    {
        $Customer = Customer::find($customer);
        $Customer->name = $request->name;
        $Customer->save();
        return response()->json($Customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $Customer = Customer::find($customer)->delete();
        return response()->json($Customer);
    }

    /**
     * Show data from model with flter on datatable.
     * 
     * @param $list, $args, $operator
     * @return \Illuminate\Http\Response
     */
    public function list_filter( $list, $args = array(), $operator = 'AND' )
    {
      if ( ! is_array( $list ) ) {
        return array();
      }

      $util = new ListUtil( $list );

      return $util->filter( $args, $operator );
    }
}
