let idioma = {
  processing: "Procesando...",
  search: "Buscar&nbsp;:",
  lengthMenu: "Mostrar _MENU_ registros",
  info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
  infoEmpty: "Mostrando 0 a 0 de 0 registros",
  infoFiltered: "(filtrado de _MAX_ registros en total)",
  infoPostFix: "",
  loadingRecords: "Cargando...",
  zeroRecords: "No se encontraron registros",
  emptyTable: "No hay datos disponibles en la tabla",
  paginate: {
    first: "Primero",
    previous: "Anterior",
    next: "Siguiente",
    last: "Último",
  },
  aria: {
    sortAscending: ": activar para ordenar la columna de manera ascendente",
    sortDescending: ": activar para ordenar la columna de manera descendente",
  },
};

let tblMedidas;

tblMedidas = $("#tblMedidas").DataTable({
  ajax: {
    url: base_url + "Medidas/listar",
    dataSrc: "",
  },
  language: idioma,
  columns: [
    { data: "id_medida" },
    { data: "descripcion_medida" },
    { data: "descripcion_corta" },
    { data: "codigoMedidaSin" },
    { data: "medida_estado" },
    { data: "acciones" },
  ],
});

function frmMedida() {
  document.getElementById("title").innerHTML = "Nueva Medida";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("frmMedida").reset();
  document.getElementById("id_medida").value = "";
  $("#medidaModal").modal("show");
}

function registrarMedida() {
  const descripcion_medida = document.getElementById("descripcion_medida");
  const descripcion_corta = document.getElementById("descripcion_corta");
  const codigoMedidaSin = document.getElementById("codigoMedidaSin");

  if (
    descripcion_medida.value == "" ||
    descripcion_corta.value == "" ||
    codigoMedidaSin.value == ""
  ) {
    Swal.fire({
      title: "Advertencia",
      text: "Todos los campos son obligatorios",
      icon: "warning",
    });
    return;
  }

  const url = base_url + "Medidas/registrar";
  const frm = document.getElementById("frmMedida");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok" || res == "modif") {
        Swal.fire({
          title: "Éxito",
          text:
            document.getElementById("id_medida").value == ""
              ? "Medida registrada correctamente"
              : "Medida actualizada correctamente",
          icon: "success",
        });
        frm.reset();
        $("#medidaModal").modal("hide");
        tblMedidas.ajax.reload();
      } else {
        Swal.fire({
          title: "Error",
          text: res,
          icon: "error",
        });
      }
    }
  };
}

function btnEditarMedida(id) {
  $("#medidaModal").modal("show");
  document.getElementById("title").innerHTML = "Editar Medida";
  document.getElementById("btnAccion").innerHTML = "Actualizar";

  const url = base_url + "Medidas/get_medida_id/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_medida").value = res.id_medida;
      document.getElementById("descripcion_medida").value =
        res.descripcion_medida;
      document.getElementById("descripcion_corta").value =
        res.descripcion_corta;
      document.getElementById("codigoMedidaSin").value = res.codigoMedidaSin;
    }
  };
}

function btnInactivarMedida(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La medida será inactivada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, inactivar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Inactivado",
              "Medida inactivada correctamente",
              "success",
            );
            tblMedidas.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

function btnActivarMedida(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La medida será activada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, activar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Activado", "Medida activada correctamente", "success");
            tblMedidas.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

let tblCategorias;

tblCategorias = $("#tblCategorias").DataTable({
  ajax: {
    url: base_url + "Categorias/listar",
    dataSrc: "",
  },
  language: idioma,
  columns: [
    { data: "id_categoria" },
    { data: "nombre_categoria" },
    { data: "codigoProductoSin" },
    { data: "categoria_estado" },
    { data: "acciones" },
  ],
});

function frmCategoria() {
  document.getElementById("title").innerHTML = "Nueva Categoría";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("frmCategoria").reset();
  document.getElementById("id_categoria").value = "";
  $("#categoriaModal").modal("show");
}

function registrarCategoria() {
  const nombre_categoria = document.getElementById("nombre_categoria");
  const codigoProductoSin = document.getElementById("codigoProductoSin");

  if (nombre_categoria.value == "" || codigoProductoSin.value == "") {
    Swal.fire({
      title: "Advertencia",
      text: "Todos los campos son obligatorios",
      icon: "warning",
    });
    return;
  }

  const url = base_url + "Categorias/registrar";
  const frm = document.getElementById("frmCategoria");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok" || res == "modif") {
        Swal.fire({
          title: "Éxito",
          text:
            document.getElementById("id_categoria").value == ""
              ? "Categoría registrada correctamente"
              : "Categoría actualizada correctamente",
          icon: "success",
        });
        frm.reset();
        $("#categoriaModal").modal("hide");
        tblCategorias.ajax.reload();
      } else {
        Swal.fire({
          title: "Error",
          text: res,
          icon: "error",
        });
      }
    }
  };
}

function btnEditarCategoria(id) {
  $("#categoriaModal").modal("show");
  document.getElementById("title").innerHTML = "Editar Categoría";
  document.getElementById("btnAccion").innerHTML = "Actualizar";

  const url = base_url + "Categorias/get_categoria_id/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_categoria").value = res.id_categoria;
      document.getElementById("nombre_categoria").value = res.nombre_categoria;
      document.getElementById("codigoProductoSin").value =
        res.codigoProductoSin;
    }
  };
}

function btnInactivarCategoria(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La categoría será inactivada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, inactivar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Inactivado",
              "Categoría inactivada correctamente",
              "success",
            );
            tblCategorias.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

function btnActivarCategoria(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La categoría será activada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, activar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Activado",
              "Categoría activada correctamente",
              "success",
            );
            tblCategorias.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

let tblClientes;

tblClientes = $("#tblClientes").DataTable({
  ajax: {
    url: base_url + "Clientes/listar",
    dataSrc: "",
  },
  language: idioma,
  columns: [
    { data: "razon_social" },
    { data: "tipo_documento" },
    { data: "documentoid" },
    { data: "complementoid" },
    { data: "cliente_email" },
    { data: "cliente_estado" },
    { data: "acciones" },
  ],
});

function frmCliente() {
  document.getElementById("title").innerHTML = "Nuevo Cliente";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("frmCliente").reset();
  document.getElementById("id_cliente").value = "";
  $("#clienteModal").modal("show");
}

function registrarCliente() {
  const tipo_documento = document.getElementById("tipo_documento");
  const documentoid = document.getElementById("documentoid");
  const razon_social = document.getElementById("razon_social");
  if (
    tipo_documento.value == "" ||
    documentoid.value == "" ||
    razon_social.value == ""
  ) {
    Swal.fire({
      title: "Advertencia",
      text: "Los campos tipo de documento, número de documento y razón social son obligatorios",
      icon: "warning",
    });
    return;
  }

  const url = base_url + "Clientes/registrar";
  const frm = document.getElementById("frmCliente");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok" || res == "modif") {
        Swal.fire({
          title: "Éxito",
          text:
            document.getElementById("id_cliente").value == ""
              ? "Cliente registrado correctamente"
              : "Cliente actualizado correctamente",
          icon: "success",
        });
        frm.reset();
        $("#clienteModal").modal("hide");
        tblClientes.ajax.reload();
      } else {
        Swal.fire({
          title: "Error",
          text: res,
          icon: "error",
        });
      }
    }
  };
}

function btnEditarCliente(id) {
  $("#clienteModal").modal("show");
  document.getElementById("title").innerHTML = "Editar Cliente";
  document.getElementById("btnAccion").innerHTML = "Actualizar";
  const url = base_url + "Clientes/get_cliente_id/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_cliente").value = res.id_cliente;
      document.getElementById("documentoid").value = res.documentoid;
      document.getElementById("complementoid").value = res.complementoid;
      document.getElementById("razon_social").value = res.razon_social;
      document.getElementById("cliente_email").value = res.cliente_email;
      document.getElementById("tipo_documento").value = res.tipo_documento;
    }
  };
}

function btnInactivarCliente(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "El cliente será inactivado",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, inactivar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Inactivado",
              "Cliente inactivado correctamente",
              "success",
            );
            tblClientes.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

function btnActivarCliente(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "El cliente será activado",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, activar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Activado", "Cliente activado correctamente", "success");
            tblClientes.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

let tblUsuarios;

tblUsuarios = $("#tblUsuarios").DataTable({
  ajax: {
    url: base_url + "Users/listar",
    dataSrc: "",
  },
  language: idioma,
  columns: [
    { data: "id_usuario" },
    { data: "nick" },
    { data: "nombre" },
    { data: "nombre_caja" },
    { data: "usuario_estado" },
    { data: "acciones" },
  ],
});

function frmUsuario() {
  document.getElementById("title").innerHTML = "Nuevo Usuario";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("frmUsuario").reset();
  document.getElementById("id_usuario").value = "";
  document.getElementById("div_clave").classList.remove("d-none");
  document.getElementById("div_confirmar").classList.remove("d-none");
  $("#usuarioModal").modal("show");
}

function registrar() {
  const nick = document.getElementById("nick");
  const nombre = document.getElementById("nombre");
  const clave = document.getElementById("clave");
  const confirmar = document.getElementById("confirmar");
  const id_usuario = document.getElementById("id_usuario").value;

  if (nick.value == "" || nombre.value == "") {
    Swal.fire({
      title: "Advertencia",
      text: "Todos los campos son obligatorios",
      icon: "warning",
    });
    return;
  }

  if (id_usuario == "") {
    if (clave.value == "" || confirmar.value == "") {
      Swal.fire({
        title: "Advertencia",
        text: "Las contraseñas son obligatorias",
        icon: "warning",
      });
      return;
    }

    if (clave.value != confirmar.value) {
      Swal.fire({
        title: "Advertencia",
        text: "Las contraseñas no coinciden",
        icon: "warning",
      });
      return;
    }
  }

  const url = base_url + "Users/registrar";
  const frm = document.getElementById("frmUsuario");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok" || res == "modif") {
        Swal.fire({
          title: "Éxito",
          text:
            id_usuario == ""
              ? "Usuario registrado correctamente"
              : "Usuario actualizado correctamente",
          icon: "success",
        });
        frm.reset();
        $("#usuarioModal").modal("hide");
        tblUsuarios.ajax.reload();
      } else {
        Swal.fire({
          title: "Error",
          text: res,
          icon: "error",
        });
      }
    }
  };
}

function btnEditarUsuario(id) {
  $("#usuarioModal").modal("show");
  document.getElementById("title").innerHTML = "Editar usuario";
  document.getElementById("btnAccion").innerHTML = "Actualizar";
  document.getElementById("div_clave").classList.add("d-none");
  document.getElementById("div_confirmar").classList.add("d-none");
  document.getElementById("clave").value = "";
  document.getElementById("confirmar").value = "";
  const url = base_url + "Users/get_usuario_id/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_usuario").value = res.id_usuario;
      document.getElementById("nick").value = res.nick;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("id_caja").value = res.id_caja;
    }
  };
}

function btnInactivarUsuario(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "El usuario será inactivado",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, inactivar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Users/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Inactivado",
              "Usuario inactivado correctamente",
              "success",
            );
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

function btnActivarUsuario(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "El usuario será activado",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, activar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Users/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Activado", "Usuario activado correctamente", "success");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

let tblCajas;

tblCajas = $("#tblCajas").DataTable({
  ajax: {
    url: base_url + "Cajas/listar",
    dataSrc: "",
  },
  language: idioma,
  columns: [
    { data: "id_caja" },
    { data: "nombre_caja" },
    { data: "caja_estado" },
    { data: "acciones" },
  ],
});

function frmCaja() {
  document.getElementById("title").innerHTML = "Nueva Caja";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("frmCaja").reset();
  document.getElementById("id_caja").value = "";
  $("#cajaModal").modal("show");
}

function registrarCaja() {
  const nombre_caja = document.getElementById("nombre_caja");

  if (nombre_caja.value == "") {
    Swal.fire({
      title: "Advertencia",
      text: "Todos los campos son obligatorios",
      icon: "warning",
    });
    return;
  }
  const url = base_url + "Cajas/registrar";
  const frm = document.getElementById("frmCaja");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok" || res == "modif") {
        Swal.fire({
          title: "Éxito",
          text:
            document.getElementById("id_caja").value == ""
              ? "Caja registrada correctamente"
              : "Caja actualizada correctamente",
          icon: "success",
        });
        frm.reset();
        $("#cajaModal").modal("hide");
        tblCajas.ajax.reload();
      } else {
        Swal.fire({
          title: "Error",
          text: res,
          icon: "error",
        });
      }
    }
  };
}

function btnEditarCaja(id) {
  $("#cajaModal").modal("show");
  document.getElementById("title").innerHTML = "Editar Caja";
  document.getElementById("btnAccion").innerHTML = "Actualizar";

  const url = base_url + "Cajas/get_caja_id/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_caja").value = res.id_caja;
      document.getElementById("nombre_caja").value = res.nombre_caja;
    }
  };
}

function btnInactivarCaja(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La caja será inactivada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, inactivar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Inactivado", "Caja inactivada correctamente", "success");
            tblCajas.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}

function btnActivarCaja(id) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "La caja será activada",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, activar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Activado", "Caja activada correctamente", "success");
            tblCajas.ajax.reload();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      };
    }
  });
}
