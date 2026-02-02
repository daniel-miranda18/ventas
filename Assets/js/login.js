function frmLogin(e) {
  e.preventDefault();
  const nick = document.getElementById("nick").value;
  const clave = document.getElementById("clave").value;

  if (nick == "") {
    document.getElementById("nick").classList.add("is-invalid");
  } else if (clave == "") {
    document.getElementById("clave").classList.add("is-invalid");
    document.getElementById("nick").classList.remove("is-invalid");
  } else {
    document.getElementById("clave").classList.remove("is-invalid");
    const url = base_url + "Users/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "ok") {
          window.location = base_url + "Home";
        } else {
          document.getElementById("alerta").classList.remove("d-none");
          document.getElementById("alerta").innerHTML = res;
        }
      }
    };
  }
}
