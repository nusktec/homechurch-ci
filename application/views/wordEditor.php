<style>
.intLink { cursor: pointer; }
img.intLink { border: 0; }
#toolBar1 select { font-size:10px; }
#textBox {
  width: 540px;
  height: 200px;
  border: 1px #000000 solid;
  padding: 12px;
  overflow: scroll;
}
#textBox #sourceText {
  padding: 0;
  margin: 0;
  min-width: 498px;
  min-height: 200px;
}
#editMode label { cursor: pointer; }
</style>
<div class="content-body pd-0" id="app">
  <!--Populate your body data here-->
  <div class="pd-20 pd-lg-25 pd-xl-30">
    <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
    <div class="row row-xs">
      <div id="editor">
        <h1>{{ check }}</h1>
        <form name="compForm" method="post" action="sample.php" onsubmit="if(validateMode()){this.myDoc.value=oDoc.innerHTML;return true;}return false;">
          <input type="hidden" name="myDoc">
          <div id="toolBar1">
            <select onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
              <option selected>- formatting -</option>
              <option value="h1">Title 1 &lt;h1&gt;</option>
              <option value="h2">Title 2 &lt;h2&gt;</option>
              <option value="h3">Title 3 &lt;h3&gt;</option>
              <option value="h4">Title 4 &lt;h4&gt;</option>
              <option value="h5">Title 5 &lt;h5&gt;</option>
              <option value="h6">Subtitle &lt;h6&gt;</option>
              <option value="p">Paragraph &lt;p&gt;</option>
              <option value="pre">Preformatted &lt;pre&gt;</option>
            </select>
            <select onchange="formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;">
              <option class="heading" selected>- font -</option>
              <option>Arial</option>
              <option>Arial Black</option>
              <option>Courier New</option>
              <option>Times New Roman</option>
            </select>
            <select onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
              <option class="heading" selected>- size -</option>
              <option value="1">Very small</option>
              <option value="2">A bit small</option>
              <option value="3">Normal</option>
              <option value="4">Medium-large</option>
              <option value="5">Big</option>
              <option value="6">Very big</option>
              <option value="7">Maximum</option>
            </select>
            <select onchange="formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;">
              <option class="heading" selected>- color -</option>
              <option value="red">Red</option>
              <option value="blue">Blue</option>
              <option value="green">Green</option>
              <option value="black">Black</option>
            </select>
            <select onchange="formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;">
              <option class="heading" selected>- background -</option>
              <option value="red">Red</option>
              <option value="green">Green</option>
              <option value="black">Black</option>
            </select>
          </div>
          <div id="toolBar2">
          <i class="fas fa-brush mg-5 tx-15  intLink" title="Clean" onclick="if(validateMode()&&confirm('Are you sure?')){oDoc.innerHTML=sDefTxt};"></i>
          <i class="fas fa-print mg-5 tx-15  intLink" title="Print" @click="printDoc"></i>
          <i class="fas fa-undo-alt mg-5 tx-15 intLink" title="Undo" @click="formatDoc('undo');"></i>
          <i class="fas fa-redo-alt mg-5 tx-15  intLink"  title="Redo" @click="formatDoc('redo');" ></i>
          <i class="fas fa-remove-format"></i>
          <i class="fas fa-remove-format mg-5 tx-15  intLink"  title="Remove formatting" @click="formatDoc('removeFormat')" ></i>
          <i class="fas fa-bold intLink mg-5 tx-15 " title="Bold" @click="formatDoc('bold');"></i>
          <i class="fas fa-italic intLink mg-5 tx-15 " title="Italic" @click="formatDoc('italic');" ></i>
          <i class="fas fa-underline intLink mg-5 tx-15 " title="Underline" @click="formatDoc('underline');"></i>
          <i class="fas fa-align-left intLink mg-5 tx-15 " title="Left align" @click="formatDoc('justifyleft');"></i>
          <i class="fas fa-align-center intLink mg-5 tx-15 " title="Center align" @click="formatDoc('justifycenter');"></i>
          <i class="fas fa-align-right intLink mg-5 tx-15" title="Right align" @click="formatDoc('justifyright');"></i>
          <i class="fas fa-list-ol intLink mg-5 tx-15" title="Numbered list" @click="formatDoc('insertorderedlist');" ></i>
          <i class="fas fa-list-ul intLink mg-5 tx-15" title="Dotted list" @click="formatDoc('insertunorderedlist');" ></i>
          <i class="fas fa-quote-left mg-5 tx-15" title="Quote" @click="formatDoc('formatblock','blockquote');" ></i>
          <i class="fas fa-outdent mg-5 tx-15" title="Delete indentation" @click="formatDoc('outdent');" ></i>
          <i class="fas fa-indent mg-5 tx-15" title="Add indentation" @click="formatDoc('indent');" ></i>
          <i class="fas fa-link mg-5 tx-15" title="Hyperlink" onclick="var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){formatDoc('createlink',sLnk)}" ></i>
            <i class="fas fa-cut intLink mg-5 tx-15" title="Cut" @click="formatDoc('cut');"></i>
            <i class="fas fa-copy intLink mg-5 tx-15" ttitle="Copy" @click="formatDoc('copy');"></i>
            <i class="fas fa-paste intLink mg-5 tx-15" ttitle="Paste" @click="formatDoc('paste');"></i>
         </div>
          <div id="textBox" contentEditable="true"></div>
          <p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p>
          <p><input type="submit" value="Send" /></p>
        </form>
        <p>{{ textoutput }}</p>
      </div>
    </div>

  </div><!-- row -->
</div>
<script>
  var user = <?php echo json_encode($user); ?>;
</script>