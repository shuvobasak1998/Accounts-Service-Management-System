import "./bootstrap";
import "./bootstrap";
import Dropzone from "dropzone";

// Optional: Set Dropzone globally (if you want to use it in multiple places)
window.Dropzone = Dropzone;

// Disable auto-discovery to manually initialize Dropzone
Dropzone.autoDiscover = false;

(function ($) {
    "use strict";

    function initSelect2() {
        $(".Select2Search").each(function () {
            var S2Element = $(this);
            var placheholder = S2Element.attr("placeholder");
            placheholder =
                placheholder !== undefined
                    ? placheholder
                    : "Type | Search | Select";
            //alert(placheholder);
            S2Element.select2({
                //minimumResultsForSearch: Infinity,
                allowClear: true,
                placeholder: placheholder,
                ajax: {
                    delay: 500,
                    url: function () {
                        return $(this).attr("data-route");
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    dataType: "json",
                    type: "POST",
                    data: function (params) {
                        return {
                            field_name: $(this).attr("name"),
                            field_val: params.term,
                            parent_val: $(this).attr("data-parent"),
                            page_limit: $(this).attr("data-limit"),
                            init_id: $(this).attr("data-val"),
                        };
                    },
                    processResults: function (data, page) {
                        return {
                            results: data.results,
                        };
                    },
                },
            });
        });

        // Event delegation for change event
        $(document).on("change", ".Select2Search", function () {
            var val = $(this).val();
            var elm = $(this).attr("data-child");
            if (elm) {
                let str = elm;
                let result = str.replace(/[\[\]]/g, "").split(",");
                $.each(result, function (key, elem) {
                    $("#" + elem)
                        .attr("data-parent", val)
                        .val([])
                        .trigger("change");
                });
            }
        });
    }

    function tinymceText() {
        tinymce.init({
            selector: "textarea#myeditor", // change this value according to your HTML
            menubar: "file edit view format tools table help",
            menu: {
                //favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'},
                file: {
                    title: "File",
                    items: "newdocument restoredraft | preview | print ",
                },
                edit: {
                    title: "Edit",
                    items: "undo redo | cut copy paste | selectall | searchreplace",
                },
                view: {
                    title: "View",
                    items: "code | visualaid visualchars visualblocks | spellchecker | preview fullscreen",
                },
                //insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                format: {
                    title: "Format",
                    items: "bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat",
                },
                tools: {
                    title: "Tools",
                    items: "spellchecker spellcheckerlanguage | code wordcount",
                },
                table: {
                    title: "Table",
                    items: "inserttable | cell row column | tableprops deletetable",
                },
                help: { title: "Help", items: "help" },
            },
            plugins: [
                "advlist image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table emoticons template paste help",
            ],
            toolbar:
                "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | print preview media | forecolor backcolor emoticons",
            toolbar_mode: "sliding",
            height: 250, // Set editor height (in pixels)
            width: "100%", // Make it responsive
        });
    }
    function dataTable() {
        $("#myTable").DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthMenu: [10, 25, 50, 100], // Rows per page options
        });
    }

    function init() {
        initSelect2();
        tinymceText();
        dataTable();
    }
    init();
})(jQuery);
