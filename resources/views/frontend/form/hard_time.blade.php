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
          top:95px;
          left:2px;
        }

        .name-footer{
          position: absolute;
          top: 80px; left:50%; right:50%;
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
                      JOB CARD <br>
                      <span style="font-weight: lighter; font-size: 25px;">(Hard Time)</span>
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
    <table width="100%" style="margin-top:5px;">
      <tr>
          <td width="100%">
            <b>Issued Date: Generated </b>
          </td>
      </tr>
    </table>
    <table width="100%" style="margin-top:2px;">
      <tr>
          <td width="30%">
              <b>CRI No : Generated </b>
          </td>
          <td width="40%"> </td>
          <td width="30%">
            <b>A/C type : Generated</b>
          </td>
      </tr>
    </table>
    <table width="100%" style="margin-top:2px;">
      <tr>
          <td width="30%">
              <b>Project No : Generated </b>
          </td>
          <td width="40%"> </td>
          <td width="30%">
            <b>A/C Reg : Generated</b>
          </td>
      </tr>
    </table>
    <table width="100%" style="margin-top:2px;">
      <tr>
          <td width="30%">
              <b>Inspection Type &nbsp; : Generated </b>
          </td>
          <td width="40%"> </td>
          <td width="30%">
            <b>A/C S/N : Generated</b>
          </td>
      </tr>
    </table>
    <table style="border-collapse: collapse; margin-top: 7px;" border="1px;" width="100%">
      <tr>
          <td style="position: relative;" width="35%" height="30">
            <div style="position: absolute;">
              Item Description :
            </div>

            <br>
            <center>Generate</center>
          </td>
          <td style="position: relative;" width="20%" height="30">
            <div style="position: absolute;">
              Postition :
            </div>

            <br>
            <center>Generate</center>
          </td>
          <td style="position: relative;" width="15%" height="30">
            <div style="position: absolute;">
              Est. Mhrs :
            </div>

            <br>
            <center>Generate</center>
          </td>
          <td width="30%" rowspan="3">
            <center>
                Removal JC No : <br> JO-1151596 <br>
                {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5,5)!!}
            </center>
          </td>
      </tr>
      <tr>
          <td style="position: relative;" width="35%" height="30">
              <div style="position: absolute;">
                Part Number :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td style="position: relative;" width="20%" height="30">
              <div style="position: absolute;">
                S/N Off :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td style="position: relative;" width="15%" height="30">
              <div style="position: absolute;">
                Actual. Mhrs :
              </div>

              <br>
              <center>Generate</center>
          </td>
      </tr>
      <tr>
          <td style="position: relative;" width="35%" height="45">
              <div style="position: absolute;">
                Remark :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td style="position: relative;" width="35%" height="45" colspan="2">
              <div style="position: absolute;">
                Accomplishment Notes :
              </div>

              <br>
              <center>Generate</center>
            </td>
      </tr>
    </table>
    <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
        <tr>
            <td style="position: relative;" width="50%" height="35">
              <div style="position: absolute;">
                Material(s) :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td width="50%" height="35">
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
            <td style="position: relative;" width="30%" height="80">
              <div style="position: absolute;">
                <b>Removed By :</b>
              </div>

              <div class="name-footer">Name</div>

              <div class="date-footer">
                  Date : <span>(Date & Time)</span>
              </div>
            <td style="position: relative;" width="30%" height="80">
              <div style="position: absolute;">
                <b>Engineeer Stamp :</b>
              </div>

              <div class="name-footer">Name</div>

              <div class="date-footer">
                  Date : <span>(Date & Time)</span>
              </div>
            </td>
            <td style="position: relative;" width="30%" height="80">
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







    <table style="border-collapse: collapse;margin-top: 5px;" border="1px;" class="table-style" width="100%">
        <tr>
          <td style="background-color: darkgrey;" height="20"></td>
        </tr>
    </table>







    <table style="border-collapse: collapse; margin-top: 4px;" border="1px;" width="100%">
        <tr>
            <td style="position: relative;" width="35%" height="30">
              <div style="position: absolute;">
                Item Description :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td style="position: relative;" width="20%" height="30">
              <div style="position: absolute;">
                Postition :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td style="position: relative;" width="15%" height="30">
              <div style="position: absolute;">
                Est. Mhrs :
              </div>

              <br>
              <center>Generate</center>
            </td>
            <td width="30%" rowspan="3">
              <center>
                Removal JC No : <br> JO-1151596 <br>
                {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5,5)!!}
            </center>
            </td>
        </tr>
        <tr>
            <td style="position: relative;" width="35%" height="30">
                <div style="position: absolute;">
                  Part Number :
                </div>

                <br>
                <center>Generate</center>
              </td>
              <td style="position: relative;" width="20%" height="30">
                <div style="position: absolute;">
                  S/N On :
                </div>

                <br>
                <center>Generate</center>
              </td>
              <td style="position: relative;" width="15%" height="30">
                <div style="position: absolute;">
                  Actual. Mhrs :
                </div>

                <br>
                <center>Generate</center>
            </td>
        </tr>
        <tr>
            <td style="position: relative;" width="35%" height="45">
                <div style="position: absolute;">
                  Remark :
                </div>

                <br>
                <center>Generate</center>
              </td>
              <td style="position: relative;" width="35%" height="45" colspan="2">
                <div style="position: absolute;">
                  Accomplishment Notes :
                </div>

                <br>
                <center>Generate</center>
              </td>
        </tr>
      </table>
      <table style="border-collapse: collapse;margin: 0px;" class="table-style" width="100%">
          <tr>
              <td style="position: relative;" width="50%" height="35">
                <div style="position: absolute;">
                  Material(s) :
                </div>

                <br>
                <center>Generate</center>
              </td>
              <td width="50%" height="35">
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
              <td style="position: relative;" width="30%" height="80">
                <div style="position: absolute;">
                  <b>Removed By :</b>
                </div>

                <div class="name-footer">Name</div>

                <div class="date-footer">
                    Date : <span>(Date & Time)</span>
                </div>
              <td style="position: relative;" width="30%" height="80">
                <div style="position: absolute;">
                  <b>Engineeer Stamp :</b>
                </div>

                <div class="name-footer">Name</div>

                <div class="date-footer">
                    Date : <span>(Date & Time)</span>
                </div>
              </td>
              <td style="position: relative;" width="30%" height="80">
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
