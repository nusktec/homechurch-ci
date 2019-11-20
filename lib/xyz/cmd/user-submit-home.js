/**
 * Created by revelation on 10/26/19.
 * Developer: eclatsoft (RSC Byte Limited)
 * Email: daraxdray86@gmail.com
 */

var vue = null;
loader();
function loader() {
    vue = new Vue({
        el: '#app',
        data: {
            error:'',
            agree:false,
            otherTestimony:[],
            show:{},
            viewT: false,
            user:user,
            disabled: false,
            info: "hello",
            toast:'',
            shForm:{
                address:'',
                address2:'null',
                uid:'',
                status:0,
                clocation:''
            },
            userSH:getSH
        
        },
        computed:{
            stringToArray(str){
                this.tags = str.split(',')
     
             }
        },
        methods:{
            useApi: useApi,
            submitHome(){
                if(this.shForm.address == '' || this.shForm.clocation == ''){
                 this.error = "Please complete the form";
                 var d = this;
                 setTimeout(function(){
                    this.error = ''
                   d.$nextTick() 
                 },1000)
                    return false;
                }
                this.shForm.uid = this.user.uid;
                this.useApi('submit',userApi.sh.submitHome, this.shForm)

            },

            delTestimony(tid){
                
                this.useApi('delete',userApi.tstm.delete,tid)
            },
            islogged:islogged,
          
           
        },
      mounted(){

      },
      filters:{
        timeago: timeago,
        firststr:firststr,
        custom_substr,custom_substr,
        dateConv:dateConv,
   
      }
      
    })
}


//CREATE TESTIMONY

function useApi(action,apiUrl,api_data){
  
    setProgress(vue, "Please wait...", true);
    
    if (api_data) {
        axios.post(apiUrl, api_data, {headers: config.axiosHeaders})
            .then((res) => {
                var resp = res.data;
                if (resp.status) {
                    //toast and reload
                    setProgress(vue, resp.msg, true);
                    vue.$data.api_msg = "Request Successfuly Sent";
                    $('#toastme').html(vue.$data.api_msg);
                    $('#successToast').toast('show');
                   setTimeout(function(){
                    window.location.href = baseUrl+'/user/submitHome';
                   },3000)
                
                } else {
                    //if the response returns false
                    $('#tstbody').html("Error! " + resp.msg);
                    $('#toastme').addClass('bg-warning');
                    $('#toastme').toast('show');
                   
                    setProgress(vue, resp.msg, false);
                    console.log(resp)
                }
            },
            (err)=> console.log(err))
            .catch(function (err) {
                $('#tstbody').html(err);
                $('#toastme').addClass('bg-danger');
                $('#toastme').toast('show');
                console.log('catched error')
                setProgress(vue, "Unable to delete at the moment...", false);
            })
    } else {
        console.log('no form data avaiable')
        setProgress(vue, "Check form fields and try again !", false);
    }
}

// (function($) {

//     'use strict'
//     // var Defaults = $.fn.select2.amd.require('select2/defaults');

//     // $.extend(Defaults.defaults, {
//     //   searchInputPlaceholder: ''
//     // });

//     // var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

//     // var _renderSearchDropdown = SearchDropdown.prototype.render;

//     // SearchDropdown.prototype.render = function(decorated) {

//     //   // invoke parent method
//     //   var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

//     //   this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

//     //   return $rendered;
//     // };
// }
//     );
$(function(){
    'use strict'

    // Basic with search
    $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });

    // // Disable search
    // $('.select2-no-search').select2({
    //   minimumResultsForSearch: Infinity,
    //   placeholder: 'Choose one'
    // });

    // // Clearable selection
    // $('.select2-clear').select2({
    //   minimumResultsForSearch: Infinity,
    //   placeholder: 'Choose one',
    //   allowClear: true
    // });

    // // Limit selection
    // $('.select2-limit').select2({
    //   minimumResultsForSearch: Infinity,
    //   placeholder: 'Choose one',
    //   maximumSelectionLength: 2
    // });

  });