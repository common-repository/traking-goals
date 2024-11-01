<?php
/**
 * Plugin Name: Traking Goals
 * Plugin URI: http://dev.memopalomas.com/plugins/Goals-for-Facebook-and-Google-analytics
 * Description: This plugin  allows you to create a goals for Google analytics, and Facebook of predetermined lead type events for telephone links, direct access links and e-mail.
 * Version: 1.0
 * Author: Memo Palomas
 * Author URI: http://about.memopalomas.com
 */


add_action( 'wp_footer', 'initialitetraking' );
function initialitetraking(){
  ?>
  <script>
  	(function ($) {

       $(document).ready(function () {

       // Agrega clases automáticamente checando el tipo de enlace
      $('a[href^=tel]').addClass("link-goal-phone");
      $('a[href^=mailto]').addClass("link-goal-email").attr("target", "_blank");
       //$('a[href^=wa.me]').addClass("link-goal-whatsaap").attr("target", "_blank");
		  $('a[href*="wa"]').addClass("link-goal-whatsaap").attr("target", "_blank");
		  $('a[href*="api.whatsapp.com"]').addClass("link-goal-whatsaap").attr("target", "_blank");
		  $('a[href*="whatsapp"]').addClass("link-goal-whatsaap").attr("target", "_blank");
       // Manejo de Eventos
       $('.link-goal-phone').click(function () {
           if (typeof gtag == 'function') {
               gtag('event', 'click', { 'event_category': 'telefono', 'event_label': 'llamada' });
               console.log('Se envio el Evento llamada');
           };
           if (typeof ga == 'function') {
               ga('send','event', 'telefono', 'click', 'llamada');
               console.log('Se envio el Evento llamada');
           };
       });
       $('.link-goal-whatsaap').click(function () {
           if (typeof gtag == 'function') {
               gtag('event', 'click', { 'event_category': 'telefono', 'event_label': 'whatsaap' });
               console.log('Se envio el Evento whatsaap');
           };
           if (typeof ga == 'function') {
               ga('send','event', 'telefono', 'click', 'whatsaap');
               console.log('Se envio el Evento whatsaap');
           };
       });

       $('.link-goal-email').click(function () {
           if (typeof gtag == 'function') {
               gtag('event', 'click', { 'event_category': 'correo', 'event_label': 'email' });
               console.log('Se envio el Evento email');
           }
           if (typeof ga == 'function') {
               ga('send', 'event', 'correo', 'click', 'email');
               console.log('Se envio el Evento email');
           };
       });

   });

})(jQuery);
  </script>
  <?php
}
