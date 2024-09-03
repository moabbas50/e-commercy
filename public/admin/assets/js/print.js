function printdata(data) {
    let mydata = document.getElementById(data);
    let myprintdata = mydata.innerHTML;
    let basebody = document.body.innerHTML
    document.body.innerHTML = myprintdata;
    window.print();
    document.body.innerHTML = basebody;
    console.log(mydata)
}
