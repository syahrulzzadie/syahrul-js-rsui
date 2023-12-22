<?php

namespace syahrulzzadie\SyahrulJs;

class SyahrulJs
{
    public static function init()
    {
        return "swalSuccess(e){Swal.fire({icon:\"success\",title:\"Berhasil!\",text:e})}swalSuccessCallback(e,a){Swal.fire({icon:\"success\",title:\"Berhasil!\",text:e}).then(function(){a()})}swalError(e){Swal.fire({icon:\"error\",title:\"Gagal!\",text:e})}swalInfo(e){Swal.fire({icon:\"info\",title:\"Informasi\",text:e})}swalWarning(e){Swal.fire({icon:\"warning\",title:\"Peringatan!\",text:e})}swalConfirm(e,a){Swal.fire({title:e,text:\"Apakah anda yakin?\",icon:\"warning\",showCancelButton:!0,confirmButtonColor:\"#3085d6\",cancelButtonColor:\"#868E96\",confirmButtonText:\"Ya, Lanjut\",cancelButtonText:\"Kembali\"}).then(e=>{e.isConfirmed?a(!0):a(!1)})}onClick(e,a){\$(\"#\"+e).click(function(){a()})}onKeyUp(e,a){\$(\"#\"+e).keyup(function(){a()})}onHover(e,a,t,n){var r='<i class=\"fa '+a+' mr-1\"></i>';\$(\"#\"+e).hover(function(){\$(this).html(r+t)},function(){\$(this).html(r+n)})}getColumnsDatatable(e){var a=[],t=e.settings().init().columns;for(var n in t)a.push(t[n].data);return a}initSearch(e){var a=\$(\"div.dataTables_filter input\");a.unbind(),a.on(\"change\",function(){e.search(a.val()).draw()})}paramCetak(e){var a=[];for(var t in e)a.push(t+\"=\"+e[t]);return a.join(\"&\")}showConsole(){console.log('".json_encode(config('database'))."')}toogleFilter(e,a){this.onClick(e,function(){var e=\$(\"#\"+a);e.is(\":visible\")?e.hide():e.show()})}setLoadingButton(e,a){var t=\$(\"#\"+e);a?(t.attr(\"disabled\",\"disabled\"),t.html('<i class=\"fa fa-spinner fa-spin mr-1\"></i>Loading..')):(t.removeAttr(\"disabled\"),t.html('<i class=\"fa fa-search mr-1\"></i>Cari'))}isRequired(e,a){return\"required\"===e.find('[name=\"'+a+'\"]').attr(\"required\")}cekValidasiInput(e,a){var t=e.find('[name=\"'+a.name+'\"]');if(!t.length)return!1;var n=t.hasClass(\"selectpicker\")?t.parent():t;return this.isRequired(e,a.name)?a.value.length>0?(n.removeClass(\"is-invalid\"),n.addClass(\"is-valid\"),!0):(n.removeClass(\"is-valid\"),n.addClass(\"is-invalid\"),!1):(n.removeClass(\"is-invalid\"),n.addClass(\"is-valid\"),!0)}validasiForm(e,a){var t=\$(\"#\"+e);if(t.length){var n=0,r=t.serializeArray();for(var i in r)this.cekValidasiInput(t,r[i])&&n++;r.length===n?a(!0,\"OKE!\"):a(!1,\"Inputan bertanda (*) wajib diisi!\")}else a(!1,\"Form tidak temukan!\")}ajaxPost(e,a,t){\$.ajax({url:e,type:\"post\",dataType:\"json\",data:a,timeout:30000,success:function(e){t(!0,\"OK!\",e)},error:function(e){t(!1,e.toString(),null)}}).fail(function(e){t(!1,e.toString(),null)})}ajaxGet(e,a){\$.ajax({url:e,type:\"get\",dataType:\"json\",timeout:30000,success:function(e){a(!0,\"OK!\",e)},error:function(e){a(!1,e.toString(),null)}}).fail(function(e){a(!1,e.toString(),null)})}ajaxPostMultipart(e,a,t){\$.ajax({type:\"POST\",url:e,dataType:\"json\",success:function(e){t(!0,\"OK!\",e)},error:function(e){t(!1,e.toString(),null)},async:!0,data:a,cache:!1,contentType:!1,processData:!1,timeout:60000})}formReset(e){\$(\"#\"+e).trigger(\"reset\")}forceResetForm(e){var a=\$(\"#\"+e),t=a.serializeArray();for(var n in t){var r=a.find('input[name=\"'+t[n].name+'\"][type=\"number\"]'),i=a.find('input[name=\"'+t[n].name+'\"][type=\"text\"]'),l=a.find('input[name=\"'+t[n].name+'\"][type=\"date\"]'),s=a.find('select[name=\"'+t[n].name+'\"]'),o=a.find('textarea[name=\"'+t[n].name+'\"]');r.length?r.val(\"0\"):i.length?i.val(\"\"):l.length?l.val(SyahrulConstant._DATE_NOW_):s.length?(s.prop(\"selectedIndex\",0),s.trigger(\"change\")):o.length&&o.val(\"\")}}setLoadingBtnCustom(e,a,t,n=!0){var r=\$(\"#\"+t);r.length&&(n?(r.attr({disabled:\"disabled\"}),r.html('<i class=\"fa fa-spin fa-spinner mr-1\"></i>Tunggu..')):(r.removeAttr(\"disabled\"),r.html('<i class=\"fa '+e+' mr-1\"></i>'+a)))}hideElement(e){\$(\"#\"+e).hide()}showElement(e){\$(\"#\"+e).show()}setFormValueName(e,a,t){var n=e.find('[name=\"'+a+'\"]');n.length&&(n.val(t),n.trigger(\"change\"))}getFormValueName(e,a){var t=e.find('[name=\"'+a+'\"]');return t.length?t.val():\"\"}initSetForm(e,a){var t=\$(\"#\"+e);for(var n in a)this.setFormValueName(t,n,a[n])}onChecked(e,a){var t=\$(\"#\"+e);t.length&&t.change(function(){t.is(\":checked\")?a(!0):a(!1)})}initDatatable(e,a,t,n,r){return this.initDatatableCallback(e,a,t,n,r,function(){console.log(\"Datatable complete..\")})}initDatatableCallback(a,i,e,n,s,t){var r={},o=[];let l=SyahrulConstant._LOGO_LOADING_DATATABLE_,c='<img class=\"img-loading-datatable\" src=\"'+l+'\">';return a=\$(\"#\"+i).DataTable({processing:!0,serverSide:!0,searching:!0,responsive:!1,scrollX:!0,ordering:!0,language:{decimal:\",\",emptyTable:\"Tidak ada data\",info:\"Tampil _START_ sampai _END_ dari _TOTAL_ baris\",infoEmpty:\"Tampil 0 sampai 0 dari 0 baris\",infoFiltered:\"(hasil dari _MAX_ total baris)\",infoPostFix:\"\",thousands:\".\",lengthMenu:\"Tampil _MENU_ baris\",loadingRecords:\"Tunggu...\",processing:'<i src=\"'+l+'\" class=\"fa fa-spin fa-3x fa-refresh m-4\"></i>',search:\"Pencarian:\",zeroRecords:\"Tidak ada hasil yang sama\",paginate:{first:\"Pertama\",last:\"Terakhir\",next:\"Selanjutnya\",previous:\"Sebelumnya\"},aria:{sortAscending:\": activate to sort column ascending\",sortDescending:\": activate to sort column descending\"}},ajax:{url:e,type:\"POST\",data:function(a){for(var i in r._token=SyahrulConstant._CSRF_TOKEN_,n)r[n[i]]=\$(\"#\"+n[i]).val();r.columns_order=o,\$.extend(a,r)}},order:[],columns:s,initComplete:function(){\$(\"#\"+i+\"_processing\").html(c)},drawCallback:function(){t()}}),o=this.getColumnsDatatable(a),this.initSearch(a),a}onChangeQuery(e,a){\$(e).change(function(){a()})}showModal(e){\$(\"#\"+e).modal(\"show\")}hideModal(e){\$(\"#\"+e).modal(\"hide\")}inputVal(e){return \$(\"#\"+e).val()}inputValGroupByName(e){return \$('input[name=\"'+e+'\"]:checked').val()}setVal(e,a){\$(\"#\"+e).val(a).trigger(\"change\")}setValSilent(e,a){\$(\"#\"+e).val(a)}setHtml(e,a){\$(\"#\"+e).html(a)}getHtml(e){let a=\$(\"#\"+e);return a.length?a.html():\"\"}setDisableRefresh(){var e=\$('meta[http-equiv=\"refresh\"]');e.length&&e.remove()}rupiah(e){let a=parseInt(e).toString().split(\",\"),t=a[0].length%3,n=a[0].substr(0,t),r=a[0].substr(t).match(/\d{3}/gi);return r&&(n+=(t?\".\":\"\")+r.join(\".\")),\"Rp\"+(n=void 0!==a[1]?n+\",\"+a[1]:n)}rupiahToNumber(e){var a=e?e.toString():\"\";return a.length>0?parseInt(a.replace(\"Rp\",\"\").replace(\".\",\"\").replace(\".\",\"\").replace(\".\",\"\").replace(\".\",\"\").replace(\".\",\"\").replace(\".\",\"\")):0}countInputValueByClass(e){var a=0,t=document.getElementsByClassName(e);for(var n in t){var r=parseFloat(t[n].value);isNaN(r)||(a+=r)}return a}countRupiahByClass(e){var a=0,t=document.getElementsByClassName(e);for(var n in t){var r=this.rupiahToNumber(t[n].innerText);isNaN(r)||(a+=r)}return a}clearInputs(e){for(var a in e){var t=\$(\"#\"+e[a]);t.length&&t.val(\"\").trigger(\"change\")}}persen(e,a){let t=parseInt(e)>0?parseFloat(e/100):0,n=parseFloat(a*t);return parseFloat(n)}clearHtml(e,a=\"\"){for(var t in e){var n=\$(\"#\"+e[t]);n.length&&n.html(a)}}dateDiffDays(e,a){var t=this.inputVal(e),n=this.inputVal(a),r=new Date(t);return Math.ceil((new Date(n).getTime()-r.getTime())/864e5)}filterCetakHari(e,a,t){return this.dateDiffDays(e,a)<=t}generateModalCetak(e,a,t){var n=\$(\"#modal-cetak-\"+e);n.length?(n.remove(),this.generateModalCetak(e,a,t)):(\$(\"body\").append(\$('<div id=\"modal-cetak-'+e+'\" class=\"modal\" tabindex=\"-1\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><h5 class=\"modal-title\">'+a+'</h5><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div><div class=\"modal-body p-0\"><iframe frameborder=\"0\" id=\"iframe-cetak-'+e+'\" style=\"width:100%;height:150px;\"></iframe></div><div class=\"modal-footer p-1\"><button type=\"button\" class=\"btn btn-sm btn-secondary m-0\" data-dismiss=\"modal\">Tutup</button></div></div></div></div>')),setTimeout(t,200))}showModalCetak(e,a,t,n){let r=this;this.generateModalCetak(e,a,function(){var a=r.paramCetak(n),i=\$(\"#modal-cetak-\"+e);if(i.length){i.modal(\"show\");var l=\$(\"#iframe-cetak-\"+e);l.length?l.attr(\"src\",t+\"?\"+a):this.swalError(\"IFrame \"+e+\" tidak ditemukan!\")}else this.swalError(\"Modal \"+e+\" tidak ditemukan!\")})}initTandaTangan(e){if(\$(\"#modal-tanda-tangan-digital\").length){let a=document.getElementById(\"tanda-tangan-area\"),t=new SignaturePad(a);\$(\"#btn-clear-tanda-tangan\").click(()=>{t.clear()}),\$(\"#btn-simpan-tanda-tangan\").click(function(){t.isEmpty()?e(!1,\"Tanda tangan tidak boleh kosong!\",null):e(!0,\"Berhasil disimpan!\",t.toDataURL())})}else Swal.fire(\"Gagal!\",\"Modal tanda tangan tidak ada!\",\"error\")}showTandaTangan(e=\"\"){let a=\$(\"#modal-tanda-tangan-digital\");if(a.length){if(e.length>0){let t=document.getElementById(\"tanda-tangan-area\"),n=new SignaturePad(t);n.fromDataURL(e)}a.modal(\"show\")}else Swal.fire(\"Gagal!\",\"Modal tanda tangan tidak ada!\",\"error\")}limitDate(e,a,t=31){let n=document.getElementById(e).value,r=document.getElementById(a).value,i=new Date(n),l=new Date(r);return i>l?(document.getElementById(a).value=n,!0):!(Math.ceil(Math.abs(l-i)/864e5)>t)||(Swal.fire(\"Peringatan!\",\"Batas maksimal 31 hari!\",\"warning\"),!1)}goBackOrClose(){1===parseInt(window.history.length)?window.close():window.history.back()}getValuesCheckbox(e,a=0){var t=[];if(!(a>0))return\"\";for(var n=1;n<=a;n++){var r=\$(\"#\"+e+n);r.length&&r.is(\":checked\")&&t.push(r.val())}return t.join(\", \")}isChecked(e){let a=\$(\"#\"+e);return!!(a.length&&a.is(\":checked\"))}setChecked(e,a){let t=\$(\"#\"+e);t.length?t.prop(\"checked\",a):alert(\"Element \"+e+\" not found!\")}setSameValueOnKeyUp(e,a){\$(\"#\"+e).keyup(function(){let e=\$(this).val();\$(\"#\"+a).val(e)})}setSameValueOnKeyUpAuto(e){\$(\"#\"+e+\"_lainnya\").keyup(function(){let a=\$(this).val();\$(\"#\"+e+\"2\").val(a)})}setCheckedIfStrContain(e,a,t){for(var n=1;n<=a;n++){let r=\$(\"#\"+e+n);if(r.length){let i=r.val();t.includes(i)?this.setChecked(e+n,!0):this.setChecked(e+n,!1)}else alert(\"Element \"+e+n+\" not found!\")}}countInputCheckedByClass(e){var a=0;let t=document.getElementsByClassName(e);for(var n in t)t[n].checked&&a++;return a}countInputCheckedByClassSameValue(e,a){var t=0;let n=document.getElementsByClassName(e);for(var r in n)n[r].checked&&n[r].value===a&&t++;return t}setCheckedIfContainOrSetInput(e,a,t,n){let r=\$(\"#\"+e),i=\$(\"#\"+a),l=\$(\"#\"+t);if(r.length&&i.length&&l.length){let s=r.val();s.includes(n)?(this.setChecked(e,!0),this.setChecked(a,!1),this.setValSilent(t,\"\")):(this.setChecked(e,!1),this.setChecked(a,!0),this.setValSilent(t,n),this.setValSilent(a,n))}}setCheckedIfContainOrSetInputAuto(e,a){let t=\$(\"#\"+e+\"1\"),n=\$(\"#\"+e+\"2\"),r=\$(\"#\"+e+\"_lainnya\");if(t.length&&n.length&&r.length){let i=t.val();i.includes(a)?(this.setChecked(e+\"1\",!0),this.setChecked(e+\"2\",!1),this.setValSilent(e+\"_lainnya\",\"\")):(this.setChecked(e+\"1\",!1),this.setChecked(e+\"2\",!0),this.setValSilent(e+\"_lainnya\",a),this.setValSilent(e+\"2\",a))}}sumInputCheckedByClass(e){var a=0;let t=document.getElementsByClassName(e);for(var n in t)t[n].checked&&(a+=parseInt(t[n].value));return a}initDelay(e,a){setTimeout(a,e)}setDisable(e,a){let t=\$(\"#\"+e);a?t.attr(\"disabled\",\"disabled\"):t.removeAttr(\"disabled\")}setUrl(e,a){\$(\"#\"+e).attr(\"href\",a)}setOnClick(e,a,t){\$(\"#\"+e).attr(\"onclick\",a+\"('\"+t+\"')\")}getSameValueIfChecked(e,a,t){for(var n=0,r=1;r<=a;r++)document.getElementById(e+r).checked&&n++;return n>0?t:0}setFormInputFromJson(e,a){let t=\$(\"#\"+e);for(var n in a){let r=t.find('[name=\"'+n+'\"]');r.length&&(r.val(a[n]),r.trigger(\"change\"))}}scanImageSrc(e){return\"http://192.168.10.5/sim/uploads/berkasdigital/\"+e.nama_file}scanImageSrcByNamaFile(e){return\"http://192.168.10.5/sim/uploads/berkasdigital/\"+e}itemSuggestionChange(e,a,t){let n=this.inputVal(e);if(\$(\"#\"+a).is(\":checked\"))n.length>0?n.includes(t)||this.setVal(e,n+\", \"+t):this.setVal(e,t);else if(n===t)this.setVal(e,\"\");else{let r=n.replace(\", \"+t,\"\");this.setVal(e,r)}}goTo(e){history.replaceState(null,null,e),window.location.reload()}datatableTemporary(e,a,t,n){let r=SyahrulConstant._URL_TEMP_.DATATABLE;return e=\$(\"#\"+a).DataTable({processing:!0,serverSide:!0,searching:!1,responsive:!1,scrollX:!0,ordering:!1,paging:!1,info:!1,ajax:{url:r,type:\"POST\",data:function(e){\$.extend(e,{_token:SyahrulConstant._CSRF_TOKEN_,name:t})}},order:[],columns:n})}datatableTemporaryCallback(e,a,t,n,r){let i=SyahrulConstant._URL_TEMP_.DATATABLE;return e=\$(\"#\"+a).DataTable({processing:!0,serverSide:!0,searching:!1,responsive:!1,scrollX:!0,ordering:!1,paging:!1,info:!1,ajax:{url:i,type:\"POST\",data:function(e){\$.extend(e,{_token:SyahrulConstant._CSRF_TOKEN_,name:t})}},order:[],columns:n,drawCallback:function(){r()}})}showTemporary(e,a){var t={_token:SyahrulConstant._CSRF_TOKEN_,name:e};let n=SyahrulConstant._URL_TEMP_.SHOW;\$.post(n,t,function(e){\"true\"===e.status?a(!0,e.message,e.data):a(!1,e.message,[])}).fail(function(e){console.log(e),a(!1,\"Internal server error\",[])})}getTemporary(e,a){var t={_token:SyahrulConstant._CSRF_TOKEN_,name:e};let n=SyahrulConstant._URL_TEMP_.GET;\$.post(n,t,function(e){\"true\"===e.status?a(!0,e.message,e.data):a(!1,e.message,[])}).fail(function(e){console.log(e),a(!1,\"Internal server error\",[])})}getTemporaryById(e,a){var t={_token:SyahrulConstant._CSRF_TOKEN_,id:e};let n=SyahrulConstant._URL_TEMP_.GET_BY_ID;\$.post(n,t,function(e){\"true\"===e.status?a(!0,e.message,e.data):a(!1,e.message,[])}).fail(function(e){console.log(e),a(!1,\"Internal server error\",[])})}addHeaderTemporary(e,a,t){var n={_token:SyahrulConstant._CSRF_TOKEN_,model:\"header\",name:e,data:JSON.stringify(a)};let r=SyahrulConstant._URL_TEMP_.ADD;\$.post(r,n,function(e){\"true\"===e.status?t(!0,e.message,e.data):t(!1,e.message,null)}).fail(function(e){console.log(e),t(!1,\"Internal server error!\",null)})}addItemTemporary(e,a,t){var n={_token:SyahrulConstant._CSRF_TOKEN_,model:\"item\",name:e,data:JSON.stringify(a)};let r=SyahrulConstant._URL_TEMP_.ADD;\$.post(r,n,function(e){\"true\"===e.status?t(!0,e.message,e.data):t(!1,e.message,null)}).fail(function(e){console.log(e),t(!1,\"Internal server error!\",null)})}updateTemporary(e,a,t){var n={_token:_CSRF_TOKEN_,id:e,data:JSON.stringify(a)};\$.post(\"{{ route('temporary-syahruljs.update') }}\",n,function(e){\"true\"===e.status?t(!0,e.message,e.data):t(!1,e.message,null)}).fail(function(e){console.log(e),t(!1,\"Internal server error!\",null)})}deleteTemporary(e){var a={_token:SyahrulConstant._CSRF_TOKEN_,id:e};let t=SyahrulConstant._URL_TEMP_.DELETE;\$.post(t,a,function(e){console.log(e)}).fail(function(e){console.log(e)})}deleteTemporaryCallback(e,a){var t={_token:SyahrulConstant._CSRF_TOKEN_,id:e};let n=SyahrulConstant._URL_TEMP_.DELETE;\$.post(n,t,function(e){\"true\"===e.status?a(!0,e.message):a(!1,e.message)}).fail(function(e){console.log(e),a(!1,\"Internal server error!\")})}clearTemporary(e){var a={_token:SyahrulConstant._CSRF_TOKEN_,name:e};let t=SyahrulConstant._URL_TEMP_.CLEAR;\$.post(t,a,function(e){console.log(e)}).fail(function(e){console.log(e)})}clearTemporaryCallback(e,a){var t={_token:SyahrulConstant._CSRF_TOKEN_,name:e};let n=SyahrulConstant._URL_TEMP_.CLEAR;\$.post(n,t,function(e){\"true\"===e.status?a(!0,e.message):a(!1,e.message)}).fail(function(e){console.log(e),a(!1,\"Internal server error!\")})}";
    }
}
