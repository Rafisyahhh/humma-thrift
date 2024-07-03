$.fn.ajaxDataTable = function (config) {
  const {
    options,
    onCreate,
    onEdit,
    onDelete,
    ajax,
    columns,
    drawCallback
  } = config;
  const {
    modal: createModal,
    text: createText,
    className: createClassName
  } = onCreate || {};
  const {
    modal: editModal,
    onClick: editOnClick,
    onError: editOnError,
    onSuccess: editSuccess
  } = onEdit || {};
  const {
    url: deleteUrl,
    onClick: deleteOnClick,
    onSuccess: deleteSuccess
  } = onDelete || {};
  let firstLoad = true;

  $.fn.dataTable.ext.buttons.create = {
    text: createText,
    className: createClassName,
    action: () => createModal?.modal("show"),
  };

  const table = this.DataTable({
    ajax,
    columns,
    processing: true,
    serverSide: true,
    scrollX: true,
    createdRow: (row) => $(row).hide().fadeIn(1000),
    ...options,
    drawCallback: () => {
      if (firstLoad) {
        firstLoad = false;
        $(this).find("tbody").hide().fadeIn(750);
      }
      drawCallback?.();
    },
  });

  const handleFormSubmit = (modal, url, onSuccess, onError) => {
    modal?.find("form").submit(function (e) {
      e.preventDefault();
      const form = $(this);
      const actionUrl = form.attr('action');
      const formData = new FormData(this);

      $.ajax({
        type: "POST",
        url: actionUrl || url,
        data: formData,
        contentType: false,
        processData: false,
        error: onError,
        complete: () => modal.modal("toggle"),
        success: (response) => {
          onSuccess?.(response);
          table.draw(false);
        }
      });
    });
  };

  table.on("click", "button.delete", function () {
    const row = $(this).closest("tr");
    const { id } = table.row(row).data();
    const formData = new FormData();
    formData.append("_method", "DELETE");

    const doDelete = () => {
      row.find("button").prop("disabled", true);
      row.fadeOut(1000, function () {
        $(this).remove();
      });
      $.ajax(deleteUrl?.replace(":id:", id), {
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
          deleteSuccess?.(response);
          table.draw(false);
        },
      });
    };
    deleteOnClick?.(doDelete);
  });

  table.on("click", "button.edit", function () {
    editModal.modal("toggle");
    const data = table.row($(this).closest("tr")).data();
    const { id } = data;
    editModal.find("form [name]").not('[type="file"]').not('[name^="_"]').each(function () {
      $(this).val(data[$(this).attr("name")]);
    });
    const editUrl = editModal.find("form").attr("action");
    editModal.find("form").attr("action", editUrl?.replace(":id:", id));
    editOnClick?.(editModal.find("form"), data);
  });

  handleFormSubmit(createModal, null, (data) => {
    table.draw(false);
  });

  handleFormSubmit(editModal, null, editSuccess, editOnError);

  this.table = table;
  return this;
};
