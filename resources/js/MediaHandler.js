export default class MediaHandler {
    

    getPermissions(){
        return new Promise(async (res,rej)=>{
            console.log("MediaHandler" , navigator.mediaDevices);
            try {
                const stream = await navigator.mediaDevices.getUserMedia({video:true,audio:true});
                res(stream);                
              } catch (e) {                
                throw new Error(`Incapaz de buscar stream ${e}`);
            }
            // navigator.mediaDevices.getUserMedia({video:true,audio:true})
            // .then((stream)=>{ //creamos nuestra promesa
            //     res(stream);
            // })
            // .catch(err => {
            //     //mandamos la exepcion
            //     throw new Error(`Incapaz de buscar stream ${err}`);
            // })
        }); 
    }
}