// noinspection JSUnresolvedFunction

import jQuery from 'jquery';
import {Calendar} from '@fullcalendar/core';

import ClassicEditor from './ckeditor5/src/ckeditor.js';

window.$ = jQuery;
jQuery(function () {
    // CKEDITOR.replace('info-description', {
    //     filebrowserUploadUrl: "{{route('upload', ['csrf-token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
    ClassicEditor
        .create(document.querySelector('#info-description'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed',
                    'htmlEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .then(editor => {
            window.descriptionEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#info-video-description'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed',
                    'htmlEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .then(editor => {
            window.descriptionEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#info-video'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed',
                    'htmlEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .then(editor => {
            window.descriptionEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
    // CKEDITOR.replace('info-media', {
    //     filebrowserUploadUrl: "{{route('upload', ['csrf-token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });

});

$(document).ready(function () {
    // Get the blocked dates from PHP variable (passed from the controller)
    var blockedDates = ['26-07-2023', '27-07-2023', '28-07-2023', '29-07-2023', '30-07-2023', '31-07-2023', '01-08-2023', '02-08-2023', '03-08-2023', '04-08-2023', '05-08-2023', '06-08-2023',];

    // // Create the FullCalendar instance
    // $('#calendar').Calendar({
    //     // Configure your calendar options here
    //     // ...
    //     // Add a custom function to disable blocked dates
    //     dayRender: function (date, cell) {
    //         var formattedDate = date.format('DD-MM-YYYY');
    //         if ($.inArray(formattedDate, blockedDates) !== -1) {
    //             cell.css('background-color', 'gray'); // Customize the style for blocked dates
    //             cell.css('pointer-events', 'none'); // Disable click events on blocked dates
    //         }
    //     },
    //
    // });
    var sectionTemplate = $('#hidden-template').html();

    // Counter to track the number of sections
    var sectionCount = 0;

    // Function to initialize TinyMCE for the new editor
    function initializeTinyMCE(editorId) {
        tinymce.init({
            selector: '#' + editorId,
            // Additional TinyMCE settings...
            plugins: 'code table lists image',
            menubar: 'insert',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            images_file_types: 'jpg,svg,webp,png',
            images_upload_base_path: '/images',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link image paste',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
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

    // Function to add a new content section
    function addContentSection() {
        sectionCount++;
        var editorId = 'editor-' + sectionCount;
        var newSection = sectionTemplate.replace(/EDITOR_ID/g, editorId);
        $('#sections-container').append(newSection);
        initializeTinyMCE(editorId);
    }

    // Event listener for the "Add New Section" button
    $('#add-section').on('click', function () {
        addContentSection();
    });

    // Initial call to add the first content section
    addContentSection();
});
