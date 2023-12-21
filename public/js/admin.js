// noinspection JSUnresolvedFunction


// const {ClassicEditor} = require('./ckeditor5/src/ckeditor.js');

window.$ = jQuery;
// import DataTable from './datatables/jquery.dataTables';
jQuery(function () {
    // CKEDITOR.replace('info-description', {
    //     filebrowserUploadUrl: "{{route('upload', ['csrf-token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
    // ClassicEditor
    //     .create(document.querySelector('#info-description'), {
    //         ckfinder: {
    //             uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
    //         },
    //         image: {
    //             // You need to configure the image toolbar, too, so it uses the new style buttons.
    //             toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
    //
    //             styles: [
    //                 // This option is equal to a situation where no style is applied.
    //                 'full',
    //
    //                 // This represents an image aligned to the left.
    //                 'alignLeft',
    //
    //                 // This represents an image aligned to the right.
    //                 'alignRight'
    //             ]
    //         },
    //         toolbar: {
    //             items: [
    //                 'heading',
    //                 '|',
    //                 'bold',
    //                 'italic',
    //                 'link',
    //                 'bulletedList',
    //                 'numberedList',
    //                 '|',
    //                 'indent',
    //                 'outdent',
    //                 'alignment',
    //                 '|',
    //                 'blockQuote',
    //                 'insertTable',
    //                 'undo',
    //                 'redo',
    //                 'CKFinder',
    //                 'mediaEmbed',
    //                 'htmlEmbed'
    //             ]
    //         },
    //         language: 'ru',
    //         table: {
    //             contentToolbar: [
    //                 'tableColumn',
    //                 'tableRow',
    //                 'mergeTableCells'
    //             ]
    //         },
    //     })
    //     .then(editor => {
    //         window.descriptionEditor = editor;
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });
    // ClassicEditor
    //     .create(document.querySelector('#info-video-description'), {
    //         ckfinder: {
    //             uploadUrl: "{{route('uploadFile').'?_token='.csrf_token()}}",
    //         },
    //         image: {
    //             // You need to configure the image toolbar, too, so it uses the new style buttons.
    //             toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
    //
    //             styles: [
    //                 // This option is equal to a situation where no style is applied.
    //                 'full',
    //
    //                 // This represents an image aligned to the left.
    //                 'alignLeft',
    //
    //                 // This represents an image aligned to the right.
    //                 'alignRight'
    //             ]
    //         },
    //         toolbar: {
    //             items: [
    //                 'heading',
    //                 '|',
    //                 'bold',
    //                 'italic',
    //                 'link',
    //                 'bulletedList',
    //                 'numberedList',
    //                 '|',
    //                 'indent',
    //                 'outdent',
    //                 'alignment',
    //                 '|',
    //                 'blockQuote',
    //                 'insertTable',
    //                 'undo',
    //                 'redo',
    //                 'CKFinder',
    //                 'mediaEmbed',
    //                 'htmlEmbed'
    //             ]
    //         },
    //         language: 'ru',
    //         table: {
    //             contentToolbar: [
    //                 'tableColumn',
    //                 'tableRow',
    //                 'mergeTableCells'
    //             ]
    //         },
    //     })
    //     .then(editor => {
    //         window.descriptionEditor = editor;
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });
    // ClassicEditor
    //     .create(document.querySelector('#info-video'), {
    //         ckfinder: {
    //             uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
    //         },
    //         image: {
    //             // You need to configure the image toolbar, too, so it uses the new style buttons.
    //             toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
    //
    //             styles: [
    //                 // This option is equal to a situation where no style is applied.
    //                 'full',
    //
    //                 // This represents an image aligned to the left.
    //                 'alignLeft',
    //
    //                 // This represents an image aligned to the right.
    //                 'alignRight'
    //             ]
    //         },
    //         toolbar: {
    //             items: [
    //                 'heading',
    //                 '|',
    //                 'bold',
    //                 'italic',
    //                 'link',
    //                 'bulletedList',
    //                 'numberedList',
    //                 '|',
    //                 'indent',
    //                 'outdent',
    //                 'alignment',
    //                 '|',
    //                 'blockQuote',
    //                 'insertTable',
    //                 'undo',
    //                 'redo',
    //                 'CKFinder',
    //                 'mediaEmbed',
    //                 'htmlEmbed'
    //             ]
    //         },
    //         language: 'ru',
    //         table: {
    //             contentToolbar: [
    //                 'tableColumn',
    //                 'tableRow',
    //                 'mergeTableCells'
    //             ]
    //         },
    //     })
    //     .then(editor => {
    //         window.videoEditor = editor;
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });
    // CKEDITOR.replace('info-media', {
    //     filebrowserUploadUrl: "{{route('upload', ['csrf-token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });

});


$(document).ready(function () {
    // Get the blocked dates from PHP variable (passed from the controller)

    // Function to initialize TinyMCE for the new editor
    function initializeTinyMCE(editorId) {
        tinymce.init({
            selector: '#' + editorId,
            // Additional TinyMCE settings...
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            images_file_types: 'jpg,svg,webp,png',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist advlist | code codesample | table | '
                + 'link image save visualblocks',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/upload/images',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                };
                input.click();
            }
        });
    }

    function initializeFullTinyMCE(editorId) {
        tinymce.init({
            selector: '#' + editorId,
            // Additional TinyMCE settings...
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            images_file_types: 'jpg,svg,webp,png',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist advlist | code codesample | table | '
                + 'link image save visualblocks',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/upload/images',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                };
                input.click();
            }
        });
    }

    initializeTinyMCE('description-editor');
    initializeTinyMCE('text-editor');
    initializeTinyMCE('gallery');
    initializeFullTinyMCE('media-editor');
    initializeFullTinyMCE('terms-content');

});
