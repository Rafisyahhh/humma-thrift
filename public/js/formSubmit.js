$.fn.formSubmit = function (callback) {
  this.ajaxForm({
    resetForm: true,
    method: callback.method || this.attr("method"),
    beforeSubmit: (formData, jqForm, options) => {
      this.find("button[type=submit]").prop("disabled", true);
      callback.beforeSubmit && callback.beforeSubmit(formData, jqForm, options);
    },
    error: (jqXHR, textStatus, errorThrown) => {
      callback.error && callback.error(jqXHR, textStatus, errorThrown);
    },
    complete: (jqXHR, textStatus) => {
      this.find("button[type=submit]").prop("disabled", false);
      callback.complete && callback.complete(jqXHR, textStatus);
    },
    success: (data, textStatus, jqXHR, $form) => {
      callback.success && callback.success(data, textStatus, jqXHR, $form);
    },
  });
  return this;
};