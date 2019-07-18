<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 3cm;
    }
    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1.2cm;
    }
    html,body{
      padding: 0;
      margin: 0;
      font-size: 12px;
    }

    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    .container{
      width: 100%;
      margin: 0 36px;
    }

    #content{
      margin-top:148px;
    }

    #content2 .container .head{
      width: 100%;
      height:32px;
      line-height: 29px;
      border-radius: 2px;
      background: #f7dd16;;
      font-weight: bold;
    }

    #content2 .container .body{
        margin-top:-10px;
    }

    /* #content2 .container .body table tr th{
        background: #d4d7db;
    } */



    </style>
</head>
<body>
    
    <header>
        <img src="./img/form/printoutdefect-card/HeaderDefectCard2.png" alt=""width="100%">
    </header>
    <footer style="margin-top:14px;">
        <div class="container" align="right">
            <span style="margin-left:6px">PAGE 2</span>
        </div>
        <img src="./img/form/printoutdefect-card/FooterDefectCard.png" width="100%" alt="" >
    </footer>
    
    <div id="content">
        <div class="container">
            <table width="100%" style="font-size: 22px;">
                <tr>
                    <td width="55%"></td>
                    <td width="45%" align="center">DC No. : <span>DC-022877</span></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="container">
            <div class="head">
                <h3 align="center">COMPONENT / PART USED</h3>
            </div>
            <div class="body">
                <table width="100%" border="1" cellpadding="4">
                    <tr style="background: background: #d4d7db;">
                        <th align="center" rowspan="2" width="4%">NO</th>
                        <th align="center" rowspan="2" width="26%">ITEM DESCRIPTION</th>
                        <th align="center" rowspan="2" width="15%">PART NUMBER</th>
                        <th align="center" colspan="2" width="18%">SERIAL NO.</th>
                        <th align="center" rowspan="2" width="8%" >QTY</th>
                        <th align="center" rowspan="2" width="14%">IPC REF</th>
                        <th align="center" rowspan="2" width="15%">REMARK</th>
                    </tr>
                    <tr>
                        <th align="center">ON</th>
                        <th align="center">OFF</th> 
                    </tr>
                    <tr>
                        <td align="center" valign="top">asd</td>
                        <td valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                        <td align="center" valign="top">asd</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
</html>