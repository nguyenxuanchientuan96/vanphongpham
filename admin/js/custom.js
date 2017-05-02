$(document).ready(function(){

	//cai dat tinymce

tinymce.init({
  selector: '#tomtat',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample responsivefilemanager '
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path: window.homeUrl + "/admin/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : window.homeUrl + "/admin/filemanager/plugin.min.js"},
  image_advtab: true,



 });

tinymce.init({
  selector: '#gioithieu',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample responsivefilemanager '
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
  external_filemanager_path: window.homeUrl + "/admin/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : window.homeUrl + "/admin/filemanager/plugin.min.js"},
  image_advtab: true,



 });

tinymce.init({
  selector: '#editor-config',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample  responsivefilemanager'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   // external_filemanager_path:location.pathname.replace("index.php/" , "") + "/filemanager",
  external_filemanager_path: window.homeUrl + "/admin/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : window.homeUrl + "/admin/filemanager/plugin.min.js"},
  image_advtab: true,


 });


	//end 

});