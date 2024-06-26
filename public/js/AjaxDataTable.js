$.fn.AjaxDataTable = function (callback) {
  const { options, onCreate, onEdit, onDelete, ajax, columns, drawCallback } = callback;
  const { createModal } = onCreate || {};
  const { editModal, url: editUrl, method: editMethod, error: editError, success: editSuccess } = onEdit || {};
  const { url: deleteUrl, token: deleteToken, success: deleteSuccess } = onDelete || {};
  let firstLoad = true;

  $.fn.dataTable.ext.buttons.create = {
    text: 'Add Data',
    action: () => createModal?.modal("toggle"),
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

  table.on("click", "button.delete", function () {
    const row = $(this).closest("tr");
    const { id } = table.row(row).data();
    row.find("button").prop("disabled", true);
    row.fadeOut(1000, function () {
      $(this).remove();
    });
    $.ajax(deleteUrl?.replace("id", id), {
      type: "DELETE",
      data: { _token: deleteToken },
      success: (response) => {
        deleteSuccess?.(response);
        table.draw();
      },
    });
  });

  table.on("click", "button.edit", function () {
    const data = table.row($(this).closest("tr")).data();
    const { id } = data;
    editModal.find("form [name]").not('[name^="_"]').each(function () {
      $(this).val(data[$(this).attr("name")]);
    });
    editModal.find("form").attr("action", editUrl?.replace("id", id));
    editModal.modal("toggle");
  });

  createModal?.formSubmit({
    error: ({ responseJSON }) => console.log(responseJSON.message),
    success: (response) => {
      createModal.modal("toggle");
      flasher.success(response);
      table.draw();
    },
  });

  editModal?.formSubmit({
    method: editMethod || "POST",
    complete: () => editModal.modal("toggle"),
    error: editError,
    success: (response) => {
      editSuccess?.(response);
      table.draw(false);
    },
  });

  return this;
};
