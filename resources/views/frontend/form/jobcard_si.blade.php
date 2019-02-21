<html>
<head>
    <style>

        th {
            text-align: center;
        }

        td{
          font-size: 12px;
        }

        h1{
          font-size: 40px;
        }

        .table-style td{
          border-left: 1px solid black;
          border-right: 1px solid black;
          border-bottom: 1px solid black;

        }
        
        .date-footer{
          position: absolute; 
          top:130px; 
          left:2px;
        }

        .name-footer{
          position: absolute;
          top: 108px; left:50%; right:50%;
        }

        .barcode{
          position: relative;
          right:50%;
          left: 50%;
        }

    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="30%">
                <center>
                    <img src="img/LogoMMF.png" alt="logo" height="80px">
                    <P>Juanda International Airport <br> Surabaya Indonesia</P>
                </center>
            </td>
            <td width="40%">
                <center>
                    <h1>
                      JOB CARD
                      <span style="font-weight: lighter; font-size: 25px;">(Special Instruction)</span>
                    </h1>
                </center>
            </td>
            <td width="30%">
                <center>
                    <div class="barcode">
                      {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5,5)!!}
                      <p style="margin-right:50%"><b>NO :</b> Generate</p>
                    </div>
                </center>

            </td>
        </tr>
    </table>
    <table style="border: 1px solid black;" width="100%">
        <tr>
            <td width="30%">
                Phone : 0812323123212
            </td>
            <td width="30%">
                Fax : Generate
            </td>
            <td width="40%">
                Email : pibnu86@gmail.com
            </td>
        </tr>
    </table>
    <table style="margin: 0px;border-collapse: collapse;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="14%">
              <div style="position: absolute;">
                SI Task No
              </div>
              <br>
              <center>Generate</center> 
            </td>
            <td style="position: relative;" width="14%">
              <div style="position: absolute;">
                  A/C Type
              </div>
              <br>
              <center>Generate</center> 
            </td>
            <td style="position: relative;" width="15%">
                <div style="position: absolute;">
                    A/C S/N
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="15%">
                <div style="position: absolute;">
                    A/C Reg
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="29%">
                <div style="position: absolute;">
                    Inspection Type
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="13%">
                <div style="position: absolute;">
                    Project No
                </div>
                <br>
                <center>Generate</center> 
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="24%">
                <div style="position: absolute;">
                    Skill
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="16%">
                <div style="position: absolute;">
                    Est. Mhrs
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="17%">
                <div style="position: absolute;">
                    Actual. Mhrs
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Work Area
                </div>
                <br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="21%">
                <div style="position: absolute;">
                    Data Issue
                </div>
                <br>
                <center>Generate</center> 
            </td>
        </tr>
    </table> 
    <table style="border-collapse: collapse;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="50%" height="20">
              <div style="position: absolute;">
                Title
              </div>
            
              <br>
              <center>Generate</center> 
            </td>
            <td width="50%" height="20">
              <div style="position: absolute;">
                Refrence
              </div>
              <br>
              <center>Generate</center>
            </td>
        </tr>
    </table>

    <table style="border-collapse: collapse;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="35">
              <div style="position: absolute;">
                Description
              </div>
              <br>
              <center>Generate</center> 
            </td>
        </tr>
    </table>
    
    <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="50%" height="100">
              <div style="position: absolute;">
                Material(s) :
              </div>
            
              <br>
              <center>Generate</center> 
            </td>
            <td width="50%" height="100">
              <div style="position: absolute;">
                Tool(s) :
              </div>
              <br>
              <center>Generate</center>
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="50 ">
              <div style="position: absolute;">
                Accomplishment Record:
              </div>
              <br>
              <center>Generate</center> 
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="18%">
                <div style="position: absolute;">
                    Discrepancies Found : 
                </div>
                <br><br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Transfer to Detect Card No :
                </div>
                <br><br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="17%">
                <div style="position: absolute;">
                    Status : 
                </div>
                <br><br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Data Issued : 
                </div>
                <br><br>
                <center>Generate</center> 
            </td>
            <td style="position: relative;" width="21%">
                <div style="position: absolute;">
                    Data Close : 
                </div>
                <br><br>
                <center>Generate</center> 
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="20">
              <div style="position: absolute;">
                Helper
              </div>
              <br>
              <center>Generate</center> 
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="30%" height="120">
              <div style="position: absolute;">
                <b>Accomplished By :</b> 
              </div>
              
              <div class="name-footer">Name</div>

              <div class="date-footer">
                  Date : <span>(Date & Time)</span>
              </div>
            <td style="position: relative;" width="30%" height="120">
              <div style="position: absolute;">
                <b>Inspected By :</b> 
              </div>

              <div class="name-footer">Name</div>

              <div class="date-footer">
                  Date : <span>(Date & Time)</span>
              </div>
            </td>
            <td style="position: relative;" width="30%" height="120">
              <div style="position: absolute;">
                <b>Rill By :</b>
              </div>
              
              <div class="name-footer">Name</div>

              <div class="date-footer">
                  Date : <span>(Date & Time)</span>
              </div>
                
            </td>
        </tr>
    </table>

</body>
</html>
