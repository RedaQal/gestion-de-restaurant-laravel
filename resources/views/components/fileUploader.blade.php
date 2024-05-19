<div id="fileUpload" class="file-container"></div>
<script>
    (function($) {
        var fileUploadCount = 0;

        $.fn.fileUpload = function() {
            return this.each(function() {
                var fileUploadDiv = $(this);
                var fileUploadId = `fileUpload-${++fileUploadCount}`;

                // Creates HTML content for the file upload area.
                var fileDivContent = `
                <label for="${fileUploadId}" class="file-upload">
                    <div>
                        <p class="mb-0">faites glisser et déposez le fichier ici</p>
                        <span class="fw-bold">ou</span>
                        <div>Parcourir les fichiers</div>
                    </div>
                    <input type="file" id="${fileUploadId}" name="image[]" multiple hidden />
                </label>
            `;

                fileUploadDiv.html(fileDivContent).addClass("file-container");

                var table = null;
                var tableBody = null;
                // Creates a table containing file information.
                function createTable() {
                    table = $(`
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 30%;">Nom de fichier</th>
                                <th>Aperçu</th>
                                <th style="width: 20%;">Taille</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                `);

                    tableBody = table.find("tbody");
                    fileUploadDiv.append(table);
                }

                // Adds the information of uploaded files to table.
                function handleFiles(files) {
                    if (!table) {
                        createTable();
                    }

                    tableBody.empty();
                    if (files.length > 0) {
                        $.each(files, function(index, file) {
                            var fileName = file.name;
                            var fileSize = (file.size / 1024).toFixed(2) + " KB";
                            var fileType = file.type;
                            var preview = fileType.startsWith("image") ?
                                `<img src="${URL.createObjectURL(file)}" alt="${fileName}" height="30">` :
                                `<i class="material-icons-outlined">visibility_off</i>`;

                            tableBody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${fileName}</td>
                                <td>${preview}</td>
                                <td>${fileSize}</td>
                                <td>${fileType}</td>
                                <td><button type="button" data-index="${index}" class="deleteBtn"><i class="fa-solid fa-trash"></i></button></td>
                            </tr>
                        `);
                        });

                        tableBody.find(".deleteBtn").click(function() {
                            $(this).closest("tr").remove();
                            let index = this.getAttribute("data-index");
                            if (tableBody.find("tr").length === 0) {
                                tableBody.append(
                                    '<tr><td colspan="6" class="no-file">aucun fichier!</td></tr>'
                                );
                            }
                            let input = document.querySelector(`#${fileUploadId}`);
                            const newFiles = [...input.files];
                            newFiles.splice(index, 1);
                            const fileList = new DataTransfer();
                            fileList.items.add(...newFiles);
                            input.files = fileList.files;
                        });
                    }
                }
                // Events triggered after dragging files.
                fileUploadDiv.on({
                    dragover: function(e) {
                        e.preventDefault();
                        fileUploadDiv.toggleClass("dragover", e.type === "dragover");
                    },
                    drop: function(e) {
                        e.preventDefault();
                        fileUploadDiv.removeClass("dragover");
                        let input = document.querySelector(`#${fileUploadId}`);
                        input.files = e.originalEvent.dataTransfer.files;
                        handleFiles(e.originalEvent.dataTransfer.files);
                    },
                });

                // Event triggered when file is selected.
                fileUploadDiv.find(`#${fileUploadId}`).change(function() {
                    handleFiles(this.files);
                });
            });
        };
    })(jQuery);
    $(document).ready(function() {
        $("#fileUpload").fileUpload();
    });
</script>
