<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    html,body{
      padding: 0;
      margin: 0;
      font-size: 12px;
    }

    ul li{
      display: inline-block;
    }

    td tr{
      margin-top:20px;
    }
    
    table{
      border-collapse: collapse;
    }

    #header .rir-number{
      height: 50px;
      width: 300px;
      float: right;
      margin-top: 80px;
    }

    #content .checkbox{
      height: 15px;
      width: 100%;
    }

    #content2, #content3{
      margin-left: 45px;
    }

    #content2{
      margin-top:-20px;
    }

    #content3 h3,{
      color: #ffa719;
    }

    #content3 .phc, 
    #content3 .pc,
    #content3 .dc.
    #content3 .mc,
    #content3 .dcs{
      margin-top: -5px;
    }

    #content3 .phc-content,
    #content3 .dc-content,
    #content3 .mc-content,{
      margin-left: 16px;
      margin-top: -25px;
    }
    
    #content3 .phc-content .phc-checkbox,
    #content3 .dc-content .dc-checkbox,
    #content3 .mc-content .mc-checkbox{
      margin-left: 16px;
      margin-top: -10px;
    }

    #content3 .pc-content,
    #content3 .dcs-content{
      margin-left: 16px;
      margin-top: -7px;
    }

    #content3 .pc-content .pc-checkbox{
      margin-left: 16px;
    }
    
    #footer{
      position: absolute;
      bottom:6px;
      font-size: 15px;
    }

    #footer .line{
      height: 10px;
      background:dodgerblue;
    }

  </style>
</head>
<body>
  
  <div id="header">
      <img src="./img/HeaderRIR.png" alt="" height="145">
      <div class="rir-number">
        <table width="100%">
          <tr>
            <td width="35%">RIR No.</td>
            <td width="65%">
              : <span>Generate</span>
            </td>
          </tr>
          <tr>
            <td width="35%">Date</td>
            <td width="65%">
              : <span>Generate</span>
            </td>
          </tr>
        </table>
      </div>
  </div>

  <div id="content">
    <ul>
      <li>
          <table width="80%" cellpadding="3">
              <tr>
                <td width="30%">Purchase Order No.</td>
                <td width="32%">
                  : <span>001/PO-MMF/PJ/05/19</span>
                </td>
                <td width="43%">
                  <span>Status :</span>
                </td>
              </tr>
              <tr>
                <td width="30%">Supplier</td>
                <td width="32%">
                  : <span>Nasgor Hotel</span>
                </td>
                <td width="5%">
                  <div class="checkbox">
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Purchase</span>
                  </div>
                </td>
                <td width="37%">
                  <div class="checkbox">
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Repair</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="30%">Delivery Document</td>
                <td width="32%">
                  : <span>001/DO-blabla</span>
                </td>
                <td width="5%">
                  <div class="checkbox">
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Serviceable</span>
                  </div>
                </td>
                <td width="37%">
                  <div class="checkbox">
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Unserviceable</span>
                  </div>
                </td>
              </tr>
          </table>
      </li>
      <li>
        <div>
            {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',4.5,4.5)!!}
        </div>
      </li>
    </ul>
  </div>

  <div id="content2">
    <table width="93%" border="1" cellpadding="3">
        <tr style="background:#eaeaea">
            <th>No</th>
            <th>Part Number</th>
            <th>Serial Number</th>
            <th>Item Description</th>
            <th>Qty</th>
        </tr>
        <tr>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
        </tr>
        <tr>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
        </tr>
        <tr>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
        </tr>
        <tr>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
            <td>$100</td>
            <td>January</td>
        </tr>
    </table>
  </div>

  <div id="content3">
    <div class="phc">
      <h3>1. PACKAGING & HANDLING CHECK</h3>
      <div class="phc-content">
        <table width="100%">
          <tr>
            <td width="33%"><h4>A. Type :</h4></td>
            <td width="67%"><h4>B. Condition :</h4></td>
          </tr>
        </table>
        <div class="phc-checkbox">
          <table width="90%">
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Reusable Container</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Satisfactory</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Wooden Box</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Unsatisfactory</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Corton Box</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check.png" alt="" width="11"> <span style="margin-left:5px;">Unpacked</span>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <table width="90%">
            <tr style="position:relative;">
              <td width="20%"><div style="position:absolute; top:0;"> If Unsatisfactory explain :</div></td>
              <td width="80%">Lorem ipsum dolor sit amet consectetur.</td>
            </tr>
        </table>
      </div>
    </div>
    <div class="pc">
      <h3>2. PRESERVATION CHECK</h3>
      <div class="pc-content">
        <div class="pc-checkbox">
          <table width="90%">
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Reusable Container</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Satisfactory</span>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <table width="90%">
            <tr style="position:relative;">
              <td width="20%"><div style="position:absolute; top:0;"> If Unsatisfactory explain :</div></td>
              <td width="80%">Lorem ipsum dolor sit amet consectetur.</td>
            </tr>
        </table>
      </div>
    </div>
    <div class="dc">
      <h3>3.DOCUMENT CHECK</h3>
      <div class="dc-content">
        <table width="100%">
          <tr>
            <td width="33%"><h4>A. General Document :</h4></td>
            <td width="67%"><h4>B. Technical Document :</h4></td>
          </tr>
        </table>
        <div class="dc-checkbox">
          <table width="90%">
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Invoice</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Certificate of conformity</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Airway Bill</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">ARC/AAT</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check.png" alt="" width="11"> <span style="margin-left:5px;">Shipping Document</span>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <table width="90%">
            <tr style="position:relative;">
              <td width="20%"><div style="position:absolute; top:0;"> If Unsatisfactory explain :</div></td>
              <td width="80%">Lorem ipsum dolor sit amet consectetur.</td>
            </tr>
        </table>
      </div>
    </div>
    <div class="mc">
      <h3>4.MATERIAL CHECK</h3>
      <div class="mc-content">
        <table width="100%">
          <tr>
            <td width="33%"><h4>A. Condition :</h4></td>
            <td width="33%"><h4>B. Quantity/Complete :</h4></td>
            <td width="34%"><h4>C. Identification :</h4></td>
          </tr>
        </table>
        <div class="mc-checkbox"  style="position:relative;">
          <table width="90%">
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Satisfactory</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Conform</span>
                </div>
              </td>
            </tr>
            <tr>
              <td width="37%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Unsatisfactory</span>
                </div>
              </td>
              <td width="62%">
                <div class="checkbox">
                  <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Not Conform</span>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <table width="90%">
            <tr style="position:relative;">
              <td width="20%"><div style="position:absolute; top:0;">If Unsatisfactory explain :</div></td>
              <td width="80%">Lorem ipsum dolor sit amet consectetur.</td>
            </tr>
        </table>
      </div>
    </div>
    <div class="dcs">
      <h3>5. DECISION</h3>
      <div class="dcs-content">
        <table width="90%">
          <tr>
            <td style="position: relative;" width="50%" height="50">
              <div style="position: absolute;">
                <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi eos distinctio consequuntur facilis ex ducimus neque laboriosam voluptatem illo rerum! Consequatur error aliquid sequi et nobis dolor consequuntur nemo asperiores!</span>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="accept">
        <table width="90%" border="2">
            <tr>
                <td style="position: relative;" width="50%" height="70">
                  <div style="position: absolute; top:10px; left:10px">
                    <b> Created By </b>
                  </div>
                  <br>
                  <center>
                  <span style="position: absolute;margin-left: auto;margin-right: auto;left: 0;right: 0; top:30px;">ibnu Pratama adi saputra : 17-10-2019</span> 
                  </center>
                </td>
                <td style="position: relative;" width="50%" height="70">
                  <div style="position: absolute;top:10px; left:10px;">
                    <b>Inspected By</b>
                  </div>
                  <br>
                  <center>
                    <span style="position: absolute;margin-left: auto;margin-right: auto;left: 0;right: 0; top:30px;">ibnu Pratama adi saputra : 17-10-2019</span> 
                  </center>
                </td>
            </tr>
        </table>
    </div>
  </div>

  <div id="footer">
    <table width="100%">
      <tr>
        <td width="65%"><div class="line"></div></td>
        <td width="17%"><span><b>FR No : F02-0764RO</b></span></td>
        <td width="18%"><div class="line"></div></td>
      </tr>
    </table>
  </div>


 

</body>
</html>