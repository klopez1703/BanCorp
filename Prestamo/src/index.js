//CONSTANTE PARA EL PAQUETE DE EXPRESS
const express = require('express');
const bp = require('body-parser');
//VARIABLE PARA LOS METODOS DE EXPRESS
var app = express();
app.use(express.json());
app.use(bp.json());

app.use("/prestamo/", require("./routes/prestamo"));
app.use("/pago/", require("./routes/pago"));
app.use("/tarjeta_credito/", require("./routes/tarjeta_credito"));
app.use("/reporte/", require("./routes/reporte"));
app.use("/activos/", require("./routes/activos"));
app.use("/balancegeneral/", require("./routes/balancegeneral"));
app.use("/compras/", require("./routes/compras"));
app.use("/egresos/", require("./routes/egresos"));
app.use("/estadoResultado/", require("./routes/estadoResultado"));
app.use("/ingresos/", require("./routes/ingresos"));
app.use("/pasivos/", require("./routes/pasivos"));
app.use("/patrimonio/", require("./routes/patrimonio"));
app.use("/personas/", require("./routes/personas"));
app.use("/cuentas/", require("./routes/cuentas"));

//EJECUTAR EL SERVER EN UN PUERTO ESPECIFICO
app.listen(3000, ()=> console.log("Server Running puerto: 3000"));
