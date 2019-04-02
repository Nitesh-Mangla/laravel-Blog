
$(document).ready( function(){ 
  
       $( '#datatable' ).DataTable( {
            'processing' : true,
            'serverside' : true,
            'columnDefs' :[{
                targets: [0],
                searching : true
            },{
                targets: [2],
                searching: false
            },
            {
                targets: [3],
                saerching: false
            }
        ],
            "ajax" :{
                "url": "blogdata",
                "type": "GET",
                "data": { "_token": "{{ csrf_token() }}" }
            }  
        } );
} );
var f = '';
$(document).on('click','button',function(){
    var id = this.id; 
    var url =  'editblog';  
    if( id != 'yes' ){
        f = id;
    }else{
        url = 'destory';
        id = f;
    }
    
    function userBlog(){
        var promise = new Promise( (resolve, reject)=>{  
    $.ajax({
        type:'GET',
        url: url,        
        data: { '_token': '{{ csrf_token() }}' ,'id' : id},
        success: ( (data)=>{
            var data = JSON.parse(data);
            if( data.status == 200 ){
                window.location.href = "http://localhost:8080/blog/public/";
            }
           
            $('#blog_id').val(data.id);
            $('#blog').val(data.name);
            resolve();
        } ),
        error: (( error )=>{
            reject(error);
        })
    }) ;
    
    }) 
        return promise;
    }

userBlog().then( (success)=>console.log()
 ).catch( (error )=>alert( error ));
   
});



