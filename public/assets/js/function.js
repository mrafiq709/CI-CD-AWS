toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let Datepicker = function () {

    let arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    let datepickerSetup = function () {

        $('.datepicker-input').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: false,
            orientation: "bottom left",
            templates: arrows,
            format: 'dd-mm-yyyy'
        });

    };

    return {
        init: function() {
            datepickerSetup();
        }
    };
}();

let Datetimepicker = function () {

    let datetimepickerSetup = function () {
        $('.datetimepicker-input').datetimepicker({
            todayHighlight: true,
            autoclose: true,
            format: 'dd-mm-yyyy hh:ii'
        });
    };

    return {
        init: function() {
            datetimepickerSetup();
        }
    };
}();

let UploadImage = function () {
    let uploadImageSetup = function () {
        $("#upload_image").on('change', function (e) {
            e.preventDefault();
            let url = baseUrl + '/upload/' + $(this).data('category-upload');
            let insertField = $(this).data('insert-field');
            let file = new FormData();
            file.append('file', $("#upload_image")[0].files[0]);
            $.ajax({
                type: 'post',
                url: url,
                processData: false,
                contentType: false,
                data: file,
                success: function (response) {
                    $("#image-upload-error").text('');
                    $('#preview-image').css('background-image', 'url(' + response.data.full_url + ')');
                    $("#" +insertField).val(response.data.file_path)
                },
                error: function (err) {
                    $("#image-upload-error").text(err.responseJSON.data.errors.file[0]);
                }
            });
        });
    };

    return {
        init: function() {
            uploadImageSetup();
        }
    };
}();

let Select2 = function() {
    let select2Setup = function () {
        $('.kt-select2').select2({
            placeholder: "Chọn giá trị",
            allowClear: true
        });
    };

    return {
        init: function() {
            select2Setup();
        }
    };
}();

let InputMasks = function() {
    let inputMasksSetup = function () {
        $('.currency-input').inputmask('999.999.999 VND', {
            numericInput: true
        });
    };

    return {
        init: function() {
            inputMasksSetup();
        }
    };
}();

const UploadFile = function() {
    const uploadFileSetup = function () {
        $('.upload-single-file .remove-file').click(function () {
            $(this).parents('.upload-single-file').find('.form-upload-file').show();
            $(this).parent('.existing-file').remove();
        })
    };

    return {
        init: function() {
            uploadFileSetup();
        }
    };
}();

let Wysiwyg = function () {
    let wysiwyg = function () {
        $('.wysiwyg').summernote({
            height: 250
        });
    };

    return {
        init: function() {
            wysiwyg();
        }
    };
}();

let DropzoneUpload = function() {
    let dropzoneSetup = function (idElement) {
        const element = $('#' + idElement);
        const url = element.data('url');
        const maxFiles = parseInt(element.data('max-files'));
        const acceptedFiles = element.data('accepted-files');
        const imagesElement = $("#images-" + idElement);
        const inputName = imagesElement.data("name");
        const errorElement = $('#error-' + idElement);

        element.dropzone({
            url: url,
            paramName: "file",
            maxFiles: maxFiles,
            addRemoveLinks: true,
            acceptedFiles: acceptedFiles,
            headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content") },
            init: function() {
                let myDropzone = this;
                let currentImagesElement = $("#images-"+ idElement +" input[type=hidden]");

                if (currentImagesElement.length) {
                    currentImagesElement.each(function(index) {
                        const path = $(this).val();
                        const uuid = $(this).attr("id");
                        const file = { path: path, upload: { uuid: uuid }, name: path, size: parseInt($(this).data("size")) };

                        myDropzone.emit('addedfile', file);
                        myDropzone.options.thumbnail.call(myDropzone, file, path);
                        myDropzone.emit('complete', file);
                        myDropzone.files.push(file);
                    });
                    // Do something
                }

                this.on("removedfile", function(file) {
                    errorElement.text('').trigger('change');
                    let removeElement = $("#" + file.upload.uuid);

                    if (removeElement.attr('name') === inputName + "[new][]" || maxFiles === 1) {
                        removeElement.remove();
                    } else {
                        removeElement.attr("name", inputName + "[delete][]");
                    }
                });

                this.on("error", function(file, rsp) {
                    if (typeof rsp == 'string') {
                        errorElement.text(rsp).trigger('change');
                    } else {
                        $(file.previewElement).find('.dz-error-message').text(rsp.data.errors.file[0]);
                    }
                });

                this.on("addedfile", function(file) {
                    if (maxFiles === 1 && myDropzone.files[1] != null) {
                        myDropzone.removeFile(myDropzone.files[0]);
                    }

                    if (maxFiles > 1 && myDropzone.files[maxFiles] != null) {
                        myDropzone.removeFile(myDropzone.files[maxFiles]);
                        $("#error-" + idElement).text(`You can not upload more ${maxFiles} files`).trigger('change');
                    }
                });

                this.on("maxfilesexceeded", function(file)
                {
                    if (maxFiles > 1) {
                        myDropzone.removeFile(file);
                        $("#error-" + idElement).text(`You can not upload more ${maxFiles} files`).trigger('change');
                    }
                });

            },
            success: function(file, rsp) {
                errorElement.text('').trigger('change');

                if (rsp.meta["is_success"]) {
                    let input = '';
                    if (maxFiles > 1) {
                        input =
                            '<input type="hidden" data-size="'+rsp.data.size+'" name="' +
                            inputName +
                            '[new][]" id="'+ file.upload.uuid +'" value="' +
                            rsp.data.file_path +
                            '"/>';
                    } else {
                        $("#images-" + idElement + ' input[name='+inputName+']').remove();

                        input =
                            '<input type="hidden" data-size="'+rsp.data.size+'"' +
                            ' name="'+inputName+'" id="'+ file.upload.uuid +'" value="' +
                            rsp.data.file_path +
                            '"/>';
                    }

                    imagesElement.append(input);
                }
            }
        });
    };

    return {
        init: function(idElement) {
            dropzoneSetup(idElement);
        }
    };
};

let Location = function() {
    let getAddress = function (province, district) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: baseUrl + `/api/v1/locations?province=${province}&district=${district}`,
                type: 'GET',
                data: {
                    key: 'value',
                },
                success: function(data) {
                    resolve(data)
                },
                error: function(error) {
                    reject(error)
                },
            });
        });
    };

    let LocationSetup = function () {
        $("#province").on('change', function (e) {
            e.preventDefault();
            let options = '<option value="">Chọn</option>';
            let getDistricts = getAddress($(this).val(), '').finally();

            $("#district").empty().append(options);
            $("#commune").empty().append(options);

            getDistricts.then(function (success, error) {
                // @todo: Add to language json
                let districts = success.data.districts;

                districts.map(function (district) {
                    return options += `<option value="${district.id}">${district.name_with_type}</option>`
                });

                $("#district").empty().append(options);
            })
        });

        $("#district").on('change', function (e) {
            e.preventDefault();
            let options = '<option value="">Chọn</option>';
            $("#commune").empty().append(options);

            let getCommunes = getAddress($("#province").val(), $(this).val()).finally();

            getCommunes.then(function (success, error) {
                // @todo: Add to language json
                let communes = success.data.communes;

                communes.map(function (commune) {
                    return options += `<option value="${commune.id}">${commune.name_with_type}</option>`
                });

                $("#commune").empty().append(options);
            })
        });
    };

    return {
        init: function() {
            LocationSetup();
        }
    };
};

jQuery(document).ready(function() {
    Datepicker.init();
    UploadImage.init();
    UploadFile.init();
    Select2.init();
    Datetimepicker.init();
    InputMasks.init();
    Wysiwyg.init();
    Location().init();
});

