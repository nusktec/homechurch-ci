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
        data: {
            msgs: messages_raw,
            msgsFrom: messages_from, 
            disabled: false, 
            info: "",
            inboxMsg:'',
            outboxMsg:'',
            user:user,
            allUser:allUser,
            api_msg:'',
            mform:{
                mto:'',
                mfrom:'',
                mtitle:'Test the model',
                mbody:'test before deploying'
            },
            message:''
},
        methods:{
            useApi: useApi,
            deleteM(mid){
                this.useApi('delete',userApi.msg.delete, mid,)
            },
            sendM(){alert(this.mform.mto);
                this.mform.mfrom = this.user.uid;
                this.useApi('create',userApi.msg.send, this.mform)
            },
            displayMessage(msg){
              this.message = msg

                // switch(why){
                // case 'inbox': this.message = msg.filter(e=>{
                //         return e.mto == filt
                //     });
                //     break;
                //   case 'outbox':
                //     this.message = msg.filter(e=>{
                //         return e.mfrom == filt
                //     });
                // }
               
            },
            groupArrayBy(key, array){
             const ret =  array.reduce((objectsByKeyValue, obj) =>{
                    const value = obj[key];
                    objectsByKeyValue[value] = (objectsByKeyValue[value] || []).concat(obj);
                    
                    return objectsByKeyValue;
                },{});
               return ret;
            }
            
        },
        mounted(){

        //    var gift = [];
        //    eachArr = [];
        //   gift = this.msgs.reduce((acc,el)=>{   
        //       var d = [el.mto]
        //      return el.mto == el.mto
        //     });
        //    this.filteredMsg = gift;
      this.inboxMsg = this.groupArrayBy('mfrom',this.msgs)
      this.outboxMsg = this.groupArrayBy('mto',this.msgsFrom)
         
           console.log(this.inboxMsg)
        },
        filters:{
           timeago: timeago,
           firststr:firststr,
           custom_substr,custom_substr,
           dateConv:dateConv,
     
        }
    })
}



function useApi(action,apiUrl,api_data){
    setProgress(vue, "Please wait...", true);
    
    if (api_data) {
        axios.post(apiUrl, api_data, {headers: config.axiosHeaders})
            .then((res) => {
                var resp = res;
                if (resp.status) {
                    //deleted in
                    setProgress(vue, resp.msg, true);
                    vue.$data.api_msg = "Message" + action + "d Succesfully";
                    $('#tstbody').html(resp.mg);
                    $('#element').toast('show');
                   setTimeout(function(){
                    window.location.href = baseUrl+'/user/messages';
                   },3000)
                
                } else {
                    setProgress(vue, resp.msg, false);
                    console.log('response error');
                    console.log(resp);
                }
            })
            .catch(function (err) {
                console.log('catched error' + err)
                setProgress(vue, "Unable to  at the moment...", false);
            })
    } else {
        console.log('no form data avaiable')
        setProgress(vue, "Check form fields and try again !", false);
    }
}
// function deleteMessageById(mid){
//     setProgress(vue, "Please wait...", true);
//     var data = mid;
    
//     if (data) {
//         axios.delete(userApi.msg.delete, data, {headers: config.axiosHeaders})
//             .then(function (res) {
//                 var resp = res.data;
//                 if (resp.status) {
//                     //deleted in
//                     setProgress(vue, resp.msg, true);
//                     vue.$data.api_msg = "Message Deleted Succesfully";
//                     setTimeout(function () {

//                         window.location.href = baseUrl+'/user/messages';
//                     }, 3000)
//                 } else {
//                     setProgress(vue, resp.msg, false);
//                 }
//             })
//             .catch(function (err) {
//                 setProgress(vue, "Unable to delete at the moment...", false);
//             })
//     } else {
//         setProgress(vue, "Check form fields and try again !", false);
//     }
// }

