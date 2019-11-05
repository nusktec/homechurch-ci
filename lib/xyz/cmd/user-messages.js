/**
 * Created by revelation on 10/26/19.
 * Developer: rscbyte.com (RSC Byte Limited)
 * Email: nusktecsoft@gmail.com
 */
var vue = null;
loader();
function loader() {
    vue = new Vue({
        el: '#app',
        data: {msg: messages_raw, disabled: false, info: ""},
    })
}