
const btnBaixarPdf = document.querySelector("#baixar-pdf");

btnBaixarPdf.addEventListener("click",()=>{

const arquivo = document.querySelector("#arquivo-pdf")

const options = {
    margin: [5,5,5,5],
    filename: "listaUsuarios.pdf",
    html2canvas: {scale:1},
    jsPDF: {unit: "mm", format: "a4", orientation:"landscape"}
}


    html2pdf().set(options).from(arquivo).save();
});




