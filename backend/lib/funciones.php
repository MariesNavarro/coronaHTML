<?php
	date_default_timezone_set('America/Mexico_City');

	function send_email_registro($id,$email,$nombre,$sucursal,$nroticket,$monto,$fecha) {
 		 //$fechahora =  date('d/m/Y H:i',strtotime($fecha));
		 $fechahora = $fecha;

		 $texto_mail = '
		 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		 <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

		 <head>
		     <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
		     <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		     <meta content="width=device-width" name="viewport" />
		     <!--[if !mso]><!-->
		     <meta content="IE=edge" http-equiv="X-UA-Compatible" />
		     <!--<![endif]-->
		     <title></title>
		     <!--[if !mso]><!-->
		     <!--<![endif]-->
		     <style type="text/css">
		         body {
		             margin: 0;
		             padding: 0;
		         }

		         table,
		         td,
		         tr {
		             vertical-align: top;
		             border-collapse: collapse;
		         }

		         * {
		             line-height: inherit;
		         }

		         a[x-apple-data-detectors=true] {
		             color: inherit !important;
		             text-decoration: none !important;
		         }
		     </style>
		     <style id="media-query" type="text/css">
		         @media (max-width: 920px) {
		             .block-grid,
		             .col {
		                 min-width: 320px !important;
		                 max-width: 100% !important;
		                 display: block !important;
		             }
		             .block-grid {
		                 width: 100% !important;
		             }
		             .col {
		                 width: 100% !important;
		             }
		             .col>div {
		                 margin: 0 auto;
		             }
		             img.fullwidth,
		             img.fullwidthOnMobile {
		                 max-width: 100% !important;
		             }
		             .no-stack .col {
		                 min-width: 0 !important;
		                 display: table-cell !important;
		             }
		             .no-stack.two-up .col {
		                 width: 50% !important;
		             }
		             .no-stack .col.num4 {
		                 width: 33% !important;
		             }
		             .no-stack .col.num8 {
		                 width: 66% !important;
		             }
		             .no-stack .col.num4 {
		                 width: 33% !important;
		             }
		             .no-stack .col.num3 {
		                 width: 25% !important;
		             }
		             .no-stack .col.num6 {
		                 width: 50% !important;
		             }
		             .no-stack .col.num9 {
		                 width: 75% !important;
		             }
		             .video-block {
		                 max-width: none !important;
		             }
		             .mobile_hide {
		                 min-height: 0px;
		                 max-height: 0px;
		                 max-width: 0px;
		                 display: none;
		                 overflow: hidden;
		                 font-size: 0px;
		             }
		             .desktop_hide {
		                 display: block !important;
		                 max-height: none !important;
		             }
		         }
		     </style>
		 </head>

		 <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
		     <!--[if IE]><div class="ie-browser"><![endif]-->
		     <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
		         <tbody>
		             <tr style="vertical-align: top;" valign="top">
		                 <td style="word-break: break-word; vertical-align: top;" valign="top">
		                     <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
		                                                 <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="https://ganaenlaferiacorona.com/img/mail/header-mail-100.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 900px; display: block;" title="Image" width="900" />
		                                                 <!--[if mso]></td></tr></table><![endif]-->
		                                             </div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 18px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 22px; margin: 0;"><span style="font-size: 18px;">Hola <strong>'.$nombre.'</strong> gracias por registrar tu ticket. Estos son los datos que registraste:</span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">Sucursal: <strong>'.$sucursal.'</strong></span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 15px; line-height: 1.2; text-align: center; font-family: Verdana, Geneva, sans-serif; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">ID Ticket: <strong>'.$nroticket.'</strong></span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">Monto Ticket: <strong>$'.$monto.'</strong></span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">Fecha y Hora de Registro: <strong>'.$fechahora.'</strong></span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#0069b3;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #0069b3; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 12px; line-height: 1.2; text-align: center; font-family: Verdana, Geneva, sans-serif; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><span style="font-size: 12px;"><strong>Visita Nuestra Página de la Promoción</strong></span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid three-up" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div></div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
		                                                 <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
		                                                 <a href="https://ganaenlaferiacorona.com" style="outline:none" tabindex="-1" target="_blank"><img align="center" alt="Image" border="0" class="center fixedwidth" src="https://ganaenlaferiacorona.com/img/mail/visita-full-8.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 180px; display: block;" title="Image" width="180" /></a>
		                                                 <!--[if mso]></td></tr></table><![endif]-->
		                                             </div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div></div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 17px; margin: 0;">Dale <strong>Like a Corona México</strong></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid three-up" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div></div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
		                                                 <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
		                                                 <a href="https://www.facebook.com/CoronaInspiraMX/" style="outline:none" tabindex="-1" target="_blank"><img align="center" alt="Image" border="0" class="center fixedwidth" src="https://ganaenlaferiacorona.com/img/mail/face-8.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 60px; display: block;" title="Image" width="60" /></a>
		                                                 <!--[if mso]></td></tr></table><![endif]-->
		                                             </div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <div></div>
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <div style="background-color:transparent;">
		                         <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
		                             <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
		                                 <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
		                                 <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
		                                 <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
		                                     <div style="width:100% !important;">
		                                         <!--[if (!mso)&(!IE)]><!-->
		                                         <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
		                                             <!--<![endif]-->
		                                             <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
		                                             <div style="color:#808080;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
		                                                 <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #808080; mso-line-height-alt: 17px;">
		                                                     <p style="font-size: 12px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 14px; margin: 0;"><span style="font-size: 12px;"><a href="https://ganaenlaferiacorona.com/ganadores.php" rel="noopener" style="text-decoration: underline; color: #0068A5;" target="_blank">Ver Ganadores Del Día</a> | <a href="https://ganaenlaferiacorona.com/legales/Terminos_Condiciones_Promocion.pdf" rel="noopener" style="text-decoration: underline; color: #0068A5;" target="_blank">Ver Términos y Condiciones</a> | Corona México © 2020</span></p>
		                                                 </div>
		                                             </div>
		                                             <!--[if mso]></td></tr></table><![endif]-->
		                                             <!--[if (!mso)&(!IE)]><!-->
		                                         </div>
		                                         <!--<![endif]-->
		                                     </div>
		                                 </div>
		                                 <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                                 <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
		                             </div>
		                         </div>
		                     </div>
		                     <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		                 </td>
		             </tr>
		         </tbody>
		     </table>
		     <!--[if (IE)]></div><![endif]-->
		 </body>
		 </html>
		 ';

	    $para  		= $email;
	    $de    		="contacto@ganaenlaferiacorona.com";   // email que envia
	    $titulo   ='=?UTF-8?B?'.base64_encode("Corona Registro de ticket").'?=';

	    // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
	    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $cabeceras .= 'Content-Transfer-Encoding: 7bit' . "\r\n";
	    $cabeceras .= 'From: Gana con Corona  '. $de . "\r\n";

	    // con copia oculta
	    $cabeceras .= 'BCC: carlos.galvez@oetcapital.com';
	    //echo $para.' '.$titulo.' '. $cabeceras,'<br>';
	    mail($para, utf8_decode($titulo), utf8_decode($texto_mail), $cabeceras);
	    // fin envio email

  		$accion='Email enviado de registro id: '.$id;
	    log_write($accion);

			update_registro_emailregistro($id);
	}

	function send_email_ganador($id,$email,$nombre,$ticket) {
  	  $link 			 = connect();
		  $listpremios = list_premios_email($id,$tipo);
			$instruc     = "";

			switch ($tipo) {
				case 'CINEPOLIS': $instruc  = "Para hacer válido tu premio acude al Cinépolis VIP de tu preferencia con tu código. Válido de Lunes a Domingo.";  break;
				case 'NETFLIX': $instruc  = "Para aclarar dudas sobre cómo hacer válido tu premio, ingresa a la página de Netflix <a href='https://www.netflix.com/mx/'>aquí</a>";  break;
				case 'SPOTIFY': $instruc  = "Para aclarar dudas sobre cómo hacer válido tu premio, ingresa a la página de Spotify <a href='https://www.spotify.com/mx/'>aquí</a>";  break;
				default: $instruc  = $tipo;  break;
			}

			$texto_mail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width" name="viewport" />
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }
    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 920px) {
            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }
            .block-grid {
                width: 100% !important;
            }
            .col {
                width: 100% !important;
            }
            .col>div {
                margin: 0 auto;
            }
            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }
            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }
            .no-stack.two-up .col {
                width: 50% !important;
            }
            .no-stack .col.num4 {
                width: 33% !important;
            }
            .no-stack .col.num8 {
                width: 66% !important;
            }
            .no-stack .col.num4 {
                width: 33% !important;
            }
            .no-stack .col.num3 {
                width: 25% !important;
            }
            .no-stack .col.num6 {
                width: 50% !important;
            }
            .no-stack .col.num9 {
                width: 75% !important;
            }
            .video-block {
                max-width: none !important;
            }
            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }
            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }
    </style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
    <!--[if IE]><div class="ie-browser"><![endif]-->
    <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
        <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="https://ganaenlaferiacorona.com/img/mail/header-mail-100.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 900px; display: block;" title="Image" width="900" />
                                                <!--[if mso]></td></tr></table><![endif]-->
                                            </div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
                                            <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
                                                    <p style="font-size: 18px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 22px; margin: 0;"><span style="font-size: 18px;">Hola <strong>'.$nombre.'</strong>  por el ticket/factura registrado <strong>'.$ticket.'</strong>, ganaste lo siguiente:</span></p>
                                                </div>
																								<div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
																										<br><br><p style="font-size: 18px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 22px; margin: 0;"><span style="font-size: 18px;">'.$listpremios.'</span></p>
																								</div>
																								<div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
																										<br><p style="font-size: 18px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 22px; margin: 0;"><span style="font-size: 12px;">'.$instruc.'</span></p>
																								</div>
                                            </div>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div></div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
                                            <div style="color:#0069b3;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #0069b3; mso-line-height-alt: 17px;">
                                                    <p style="font-size: 12px; line-height: 1.2; text-align: center; font-family: Verdana, Geneva, sans-serif; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><span style="font-size: 12px;"><strong>Visita Nuestra Página de la Promoción</strong></span></p>
                                                </div>
                                            </div>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid three-up" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div></div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
                                                <a href="https://ganaenlaferiacorona.com" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="Image" border="0" class="center fixedwidth" src="https://ganaenlaferiacorona.com/img/mail/visita-full-8.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; width: 100%; max-width: 180px; display: block;" title="Image" width="180" /></a>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                            </div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div></div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
                                            <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
                                                    <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 17px; margin: 0;">Dale <strong>Like a Corona México</strong></p>
                                                </div>
                                            </div>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid three-up" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div></div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
                                                <a href="https://www.facebook.com/CoronaInspiraMX/" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="Image" border="0" class="center fixedwidth" src="https://ganaenlaferiacorona.com/img/mail/face-8.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; width: 100%; max-width: 60px; display: block;" title="Image" width="60" /></a>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                            </div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td><td align="center" width="300" style="background-color:transparent;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num4" style="max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <div></div>
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;">
                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 900px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:900px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="900" style="background-color:transparent;width:900px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                                <div class="col num12" style="min-width: 320px; max-width: 900px; display: table-cell; vertical-align: top; width: 900px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Verdana, sans-serif"><![endif]-->
                                            <div style="color:#808080;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #808080; mso-line-height-alt: 17px;">
                                                    <p style="font-size: 12px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 14px; margin: 0;"><span style="font-size: 12px;"><a href="https://ganaenlaferiacorona.com/ganadores.html" rel="noopener" style="text-decoration: underline; color: #0068A5;" target="_blank">Ver Ganadores Del Día</a> | <a href="https://ganaenlaferiacorona.com/terminos.pdf" rel="noopener" style="text-decoration: underline; color: #0068A5;" target="_blank">Ver Términos y Condiciones</a> | Corona México © 2020</span></p>
                                                </div>
                                            </div>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div>
                                        <!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <!--[if (IE)]></div><![endif]-->
</body>

</html>';

			$para  		= $email;
			$de    		="contacto@ganaenlaferiacorona.com";   // email que envia
			$titulo   ='=?UTF-8?B?'.base64_encode("Corona ganador").'?=';

			// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'Content-Transfer-Encoding: 7bit' . "\r\n";
			$cabeceras .= 'From: Gana con Corona '. $de . "\r\n";

			// con copia oculta
			$cabeceras .= 'BCC: carlos.galvez@oetcapital.com';
			//echo $para.' '.$titulo.' '. $cabeceras,'<br>';
			mail($para, utf8_decode($titulo), utf8_decode($texto_mail), $cabeceras);
			// fin envio email

			$accion='Email enviado de ganador id: '.$id.' '.$tipo;
			log_write($accion);
			Close($link);

		  update_registro_emailganador($id);
	}

	function get_country_api(&$country_code,&$ip_address,&$country_region,&$codpais){
	    $salida     = 0;
	    $geopluginURL   = 'http://www.geoplugin.net/php.gp?ip='.$ip_address;
	    if ( function_exists('curl_init') ) {

	      //use cURL to fetch data
	      $ch = curl_init();
	      curl_setopt($ch, CURLOPT_URL, $geopluginURL);
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	      curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.1');
	      $response = curl_exec($ch);
	      curl_close ($ch);

	    } else if ( ini_get('allow_url_fopen') ) {

	      //fall back to fopen()
	      $response = file_get_contents($geopluginURL, 'r');

	    } else {

	      //trigger_error ('geoPlugin class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
	      //return;

	    }
	    $addrDetailsArr = unserialize($response);
	    $country_code   = $addrDetailsArr['geoplugin_countryName'];

	    if ($country_code!='')
	    {
	      $country_region = $addrDetailsArr['geoplugin_regionCode'];
	      $codpais = $addrDetailsArr['geoplugin_countryCode'];
	      $salida = 1;
	    }
	    else {
	      $country_code   = 'México';
	      $country_region = 'ALL';
	      $codpais = 'MX';
	    }
	    return $salida;
	}

	function encrypt_decrypt($action, $string) {
       $output = false;

       $encrypt_method = "AES-256-CBC";
       $secret_key = 'G3pp2019';  // por defecto
       $secret_iv  = 'O3tcapital';   // por defecto

       // hash
       $key = hash('sha256', $secret_key);

       // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
       $iv = substr(hash('sha256', $secret_iv), 0, 16);

       if( $action == 'e' ) {
           $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
           $output = base64_encode($output);
       }
       else if( $action == 'd' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
       }
       return $output;
}
?>
