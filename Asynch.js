
function AJAXRequest(){
    try{
      http_request = new XMLHttpRequest();
    } catch (e) {
      try{
        http_request =  new ActiveXObject("Maxm12.XMLHTTP");
      } catch (e) {
        try{
          http_request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e){
          alert("your browser broke ):");
          return false;
        }
      }
    }
    return http_request;
}
