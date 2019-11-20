new Vue({
    created: {
      initDoc: function() {
        this.oDoc = document.getElementById("textBox");
        this.sDefTxt = oDoc.innerHTML ="";
        if (document.compForm.switchMode.checked)
         { 
           this.setDocMode(true);
            }
      }
    },
      el: '#editor',
      data:{
          check: 'Vue Works',
          link:'',
          textoutput:'',
         oDoc: '' ,
         sDefTxt:''
  
      },
      methods:{
                
  formatDoc: function(sCmd, sValue) {
      if (this.validateMode()) { 
        document.execCommand(sCmd, false, sValue); 
        this.oDoc.focus(); 
      }
    },
  
    
   validateMode: function() {
      if (!document.compForm.switchMode.checked)
       { return true ; 
          }
      alert("Uncheck \"Show HTML\".");
      this.oDoc.focus();
      return false;
    },
    
  setDocMode: function(bToSource) {
      var oContent;
      if (bToSource) {
        oContent = document.createTextNode(oDoc.innerHTML);
        this.oDoc.innerHTML = "";
        var oPre = document.createElement("pre");
        this.oDoc.contentEditable = false;
        oPre.id = "sourceText";
        oPre.contentEditable = true;
        oPre.appendChild(oContent);
        this.oDoc.appendChild(oPre);
        document.execCommand("defaultParagraphSeparator", false, "div");
      } else {
        if (document.all) {
          this.oDoc.innerHTML = oDoc.innerText;
        } else {
          oContent = document.createRange();
          oContent.selectNodeContents(oDoc.firstChild);
          this.oDoc.innerHTML = oContent.toString();
        }
        this.oDoc.contentEditable = true;
      }
      this.oDoc.focus();
    },
    
   printDoc: function() {
      
    if (!validateMode()) { return; }
    var oPrntWin = window.open("","_blank","width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
    oPrntWin.document.open();
    oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
    oPrntWin.document.close();
  },
  createLink: function()
  {
      this.link = prompt('Write the URL here','http:\/\/');
      if(this.link&&this.link!=''&&this.link!='http://')
      {
          formatDoc('createlink',this.link)
      }
  }
    
    
      }
  })