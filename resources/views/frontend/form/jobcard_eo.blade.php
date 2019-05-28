<html>
<head>
    <style>
        td{
          font-size: 12px;
        }

        h1{
          font-size: 40px;
        }

        .table-style{
            border-collapse: collapse;
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
          top: 108px; 
          width: 100%;
          text-align: center;
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
                        JOB CARD<span style="font-weight: lighter; font-size: 25px;">(Engineering Order)</span>
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
    <table class="table-style" style="border-top:1px solid black;" width="100%">
        <tr>
            <td width="30%">
                Phone : <span>0812323123212</span> 
            </td>
            <td width="30%">
                Fax : <span>Generate</span> 
            </td>
            <td width="40%">
                Email : <span>pibnu86@gmail.com</span> 
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="14%">
                <div style="position: absolute;">
                    EO Task No
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="14%">
                <div style="position: absolute;">
                    A/C Type
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="15%">
                <div style="position: absolute;">
                    A/C S/N
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="15%">
                <div style="position: absolute;">
                    A/C Reg
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="29%">
                <div style="position: absolute;">
                    Inspection Type
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="13%">
                <div style="position: absolute;">
                    Project No
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="24%">
                <div style="position: absolute;">
                    Skill
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="16%">
                <div style="position: absolute;">
                    Est. Mhrs
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="17%">
                <div style="position: absolute;">
                    Actual. Mhrs
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Work Area
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="21%">
                <div style="position: absolute;">
                    Data Issue
                </div>
                <br>
                <span><center>Generate</center></span> 
            </td>
        </tr>
    </table> 
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="50%" height="20">
              <div style="position: absolute;">
                Title
              </div>
              <br>
              <span><center>Generate</center></span> 
            </td>
            <td width="50%" height="20">
              <div style="position: absolute;">
                Refrence
              </div>
              <br>
              <span><center>Generate</center></span>
            </td>
        </tr>
    </table>

    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="35">
              <div style="position: absolute;">
                Description
              </div>
              <br>
              <span><center>Generate</center></span> 
            </td>
        </tr>
    </table>
    
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="50%" height="100">
              <div style="position: absolute;">
                Material(s) :
              </div>
              <br>
              <span><center>Generate</center></span> 
            </td>
            <td width="50%" height="100">
              <div style="position: absolute;">
                Tool(s) :
              </div>
              <br>
              <span><center>Generate</center></span>
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="50 ">
              <div style="position: absolute;">
                Accomplishment Record:
              </div>
              <br>
              <span><center>Generate</center></span> 
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="18%">
                <div style="position: absolute;">
                    Discrepancies Found : 
                </div>
                <br><br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Transfer to Detect Card No :
                </div>
                <br><br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="17%">
                <div style="position: absolute;">
                    Status : 
                </div>
                <br><br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="22%">
                <div style="position: absolute;">
                    Data Issued : 
                </div>
                <br><br>
                <span><center>Generate</center></span> 
            </td>
            <td style="position: relative;" width="21%">
                <div style="position: absolute;">
                    Data Close : 
                </div>
                <br><br>
                <span><center>Generate</center></span> 
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="100%" height="20">
              <div style="position: absolute;">
                Helper
              </div>
              <br>
              <span><center>Generate</center></span> 
            </td>
        </tr>
    </table>
    <table class="table-style" width="100%">
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
