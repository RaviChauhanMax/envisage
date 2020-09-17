<table width="600" align="center" style="margin:20px auto;border: 20px solid #ff461d;" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>  
            <td>
                <img src="{{url('frontEnd/img/logo.png')}}" width="150" height="auto" alt="" class="CToWUd a6T" tabindex="0" style="margin: 0 auto;margin-bottom:30px;display: block;margin-top:30px">
            </td>
        </tr>
        <tr>
            <td style="border-top:5px solid #f7f7f5;" bgcolor="#fff">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="center" style="font:35px/38px Arial,Helvetica,sans-serif;color:#292c34;padding:0 0 15px;padding:30px">
                                <p style="font-size:16px;margin:0">Hello <b>Admin</b></p>
                                <span style="font-size:16px">A new query has been received.</span>     
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0 0 20px">
                                <table align="center" cellpadding="0" cellspacing="0" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div style="font-family:Arial,Helvetica,sans-serif;margin-bottom:20px">
                                                    <div style="background:#ff461d;text-align:center;font-size:18px;font-weight:600;padding:12px 0; color:#fff">
                                                        Query Details
                                                    </div>
                                                    <div style="padding: 12px;">
                                                        <table style="border-collapse:collapse;width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:left;padding:5px;font-size:13px">Name</th>
                                                                    <th style="text-align:left;padding:5px;font-size:13px">Email</th>
                                                                     <th style="text-align:left;padding:5px;font-size:13px">Time</th>
                                                                    <th style="text-align:left;padding:5px;font-size:13px">Subject</th>
                                                                    <th style="text-align:left;padding:5px;font-size:13px">Mobile Number</th>
                                                                    <th style="text-align:left;padding:5px;font-size:13px">Message</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding:5px;font-size:12px"><?php echo ucfirst($data['data']['name']); ?></td>
                                                                    <td style="padding:5px;font-size:12px"><a href="mailto:<?php echo $data['data']['email']; ?>" rel="noreferrer" target="_blank"><?php echo $data['data']['email']; ?></a></td>
                                                                    <td style="padding:5px;font-size:12px"><?php echo ucfirst($data['data']['scheduled_at']); ?></td>
                                                                    <td style="padding:5px;font-size:12px"><?php echo $data['data']['subject_id']; ?></td>
                                                                    <td style="padding:5px;font-size:12px"><?php echo $data['data']['mobile_no']; ?></td>
                                                                    <td style="padding:5px;font-size:12px"><?php echo $data['data']['query']; ?></td><td> 
                                                                </td></tr>  
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr> 
        <tr>
            <td style="background:#ff461d;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th width="400" align="center" style="vertical-align:top;padding:0">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;font:12px/16px Arial,Helvetica,sans-serif;color:#000;color:#fff;">
                                                Copyright © <?php echo date('Y');?> All Rights Reserved.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </th> 
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr> 
    </tbody>
</table>