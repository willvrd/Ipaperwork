<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  @includeFirst(['ipaperwork.emails.style', 'ipaperwork::emails.base.style'])
  

</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
        
            <tbody>
            
            <tr>
                <td height="30"></td>
            </tr>
            
            <tr bgcolor="#4c4e4e">
                <td width="100%" align="center" valign="top" bgcolor="#4c4e4e">
        
                   
                    @includeFirst(['ipaperwork.emails.header', 'ipaperwork::emails.base.header'])
                                      
                    <!----------   main content------------>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="container" bgcolor="F2F2F2">
        
        
                        <!--------- Header  ---------->
                        <tbody>
        
                        <tr bgcolor="F2F2F2">
                            <td height="20"></td>
                        </tr>
                        <!---------- end header --------->
        
        
                        <!--------- main section --------->
                        <tr>
                            <td>
                                <table border="0" width="560" align="center" cellpadding="0" cellspacing="0"
                                       class="container-middle">
        
                                    <tbody>
                                    <tr>
                                        <td align="center">
                                            <td height="25"></td>
                                        </td>
                                    </tr>
        
                                    <tr bgcolor="ffffff">
                                        <td height="7"></td>
                                    </tr>
                                 
                                    <tr bgcolor="ffffff">
                                        <td height="20"></td>
                                    </tr>
        
                                    <tr bgcolor="ffffff">
                                        <td>
                                            
                                        @includeFirst(['ipaperwork.emails.content.userpaperwork', 'ipaperwork::emails.content.userpaperwork'])
                                            
                                        </td>
                                    </tr>
        
                                    <tr bgcolor="ffffff">
                                        <td height="25"></td>
                                    </tr>
        
                                    <tr>
                                        <td align="center">
                                            <td height="25"></td>
                                        </td>
                                    </tr>
        
                                    </tbody>
                                </table>
                            </td>
                        </tr><!--------- end main section --------->
    
                        <tr>
                            <td align="center" mc:edit="copy2"
                                style="color: #939393; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;"
                                class="prefooter-subheader">
                                <multiline>
                                    <span style="color: #000">Dirección</span> 
                                    Carrera 5 sur #83-40 local 14 Mall florida 3, mezzanine. Ibagué -Tolima. &nbsp;&nbsp;&nbsp;
                                    <span style="color: #000">Tlf :</span> 312 676 1567 &nbsp;&nbsp;&nbsp;
                                    <span style="color: #000">Email :</span> info@asesoriashc.com 
                                </multiline>
                            </td>
                        </tr>
        
                        <tr><td height="30"></td></tr>

                        </tbody>
                    </table>
                    <!------------ end main Content ----------------->
                   
                    @includeFirst(['ipaperwork.emails.footer', 'ipaperwork::emails.base.footer'])
                    
                </td>
            </tr>
        
            <tr>
                <td height="30"></td>
            </tr>
        
            </tbody>
            
            
        </table>
</body>

</html>