"use strict";(self.webpackChunkapp=self.webpackChunkapp||[]).push([[9265],{6769:(E,_,n)=>{n.d(_,{$:()=>C});var o=n(8256),s=n(1433),u=n(6895),l=n(4731);function p(a,t){if(1&a){const h=o.EpF();o.TgZ(0,"div",3)(1,"ion-button",4),o.NdJ("click",function(){o.CHM(h);const f=o.oxw();return o.KtG(f.onGoingBack())}),o._UZ(2,"ion-icon",5),o.qZA()()}}function g(a,t){if(1&a){const h=o.EpF();o.TgZ(0,"div",6)(1,"ion-button",4),o.NdJ("click",function(){o.CHM(h);const f=o.oxw();return o.KtG(f.onGoingHome())}),o._UZ(2,"ion-icon",7),o.qZA()()}}function y(a,t){if(1&a){const h=o.EpF();o.TgZ(0,"div",6)(1,"ion-button",4),o.NdJ("click",function(){o.CHM(h);const f=o.oxw();return o.KtG(f.customButton.click())}),o._UZ(2,"ion-icon",8),o.qZA()()}if(2&a){const h=o.oxw();o.xp6(2),o.Q6J("name",h.customButton.icon)}}let C=(()=>{class a{constructor(h){this.router=h}ngOnInit(){}onGoingHome(){this.router.navigateByUrl(this.homeUrl)}onGoingBack(){this.router.navigateByUrl(this.backUrl)}}return a.\u0275fac=function(h){return new(h||a)(o.Y36(s.F0))},a.\u0275cmp=o.Xpm({type:a,selectors:[["app-header-buttons"]],inputs:{homeUrl:"homeUrl",backUrl:"backUrl",customButton:"customButton"},decls:4,vars:3,consts:[[1,"row","mt-2","mx-0"],["class","col",4,"ngIf"],["class","col text-end",4,"ngIf"],[1,"col"],["size","small",3,"click"],["slot","icon-only","name","arrow-back-outline"],[1,"col","text-end"],["slot","icon-only","name","home-sharp"],["slot","icon-only",3,"name"]],template:function(h,I){1&h&&(o.TgZ(0,"div",0),o.YNc(1,p,3,0,"div",1),o.YNc(2,g,3,0,"div",2),o.YNc(3,y,3,1,"div",2),o.qZA()),2&h&&(o.xp6(1),o.Q6J("ngIf",I.backUrl),o.xp6(1),o.Q6J("ngIf",I.homeUrl),o.xp6(1),o.Q6J("ngIf",I.customButton))},dependencies:[u.O5,l.YG,l.gu],encapsulation:2}),a})()},1576:(E,_,n)=>{n.d(_,{Y:()=>l});var o=n(6895),s=n(4731),u=n(8256);let l=(()=>{class p{}return p.\u0275fac=function(y){return new(y||p)},p.\u0275mod=u.oAB({type:p}),p.\u0275inj=u.cJS({imports:[o.ez,s.Pc]}),p})()},9265:(E,_,n)=>{n.r(_),n.d(_,{BeltInitialFormPageModule:()=>W});var o=n(6895),s=n(433),u=n(4731),l=n(655),p=n(4464),g=n(7368),y=n(6090),C=n(7423),a=n(313),t=n(8256),h=n(8022),I=n(8920),f=n(1433),T=n(6572),B=n(2414),U=n(3916),Z=n(6250),P=n(6280),F=n(2424),G=n(1481),M=n(1006),N=n(6769);function J(c,S){if(1&c){const e=t.EpF();t.TgZ(0,"img",22),t.NdJ("click",function(){const r=t.CHM(e),d=r.$implicit,m=r.index,v=t.oxw(3);return t.KtG(v.onImgClicked(d.id,m))}),t.qZA()}if(2&c){const e=S.$implicit;t.Q6J("src",e.url,t.LSH)("ngStyle",e.expand)}}function w(c,S){if(1&c){const e=t.EpF();t.TgZ(0,"ion-button",23),t.NdJ("click",function(){t.CHM(e);const r=t.oxw(3);return t.KtG(r.onAddPhoto())}),t._UZ(1,"ion-icon",24),t.qZA()}}function L(c,S){if(1&c&&(t.TgZ(0,"ion-row")(1,"ion-col",19),t.YNc(2,J,1,2,"img",20),t.YNc(3,w,2,0,"ion-button",21),t.qZA()()),2&c){const e=t.oxw(2);t.xp6(1),t.Q6J("size",12),t.xp6(1),t.Q6J("ngForOf",e.ImageSrc),t.xp6(1),t.Q6J("ngIf",e.ImageSrc.length<10)}}function D(c,S){if(1&c){const e=t.EpF();t.TgZ(0,"form",4),t.NdJ("ngSubmit",function(){t.CHM(e);const r=t.oxw();return t.KtG(r.onSubmit())}),t.TgZ(1,"div",5)(2,"h1"),t._uU(3),t.qZA(),t.TgZ(4,"ion-item",6)(5,"ion-label",7),t._uU(6,"*T\xedtulo"),t.qZA(),t._UZ(7,"ion-input",8),t.qZA(),t.TgZ(8,"ion-item",9)(9,"ion-label",7),t._uU(10,"*Fecha"),t.qZA(),t._UZ(11,"ion-input",10),t.qZA(),t.TgZ(12,"ion-item",9)(13,"ion-label",7),t._uU(14,"*Hora"),t.qZA(),t._UZ(15,"ion-input",11),t.qZA(),t.TgZ(16,"ion-item",12)(17,"ion-label",7),t._uU(18,"Descripci\xf3n"),t.qZA(),t._UZ(19,"ion-textarea",13),t.qZA(),t._UZ(20,"ion-input",14)(21,"ion-input",15),t.TgZ(22,"app-map",16),t.NdJ("centerEvent",function(r){t.CHM(e);const d=t.oxw();return t.KtG(d.onSetCoords(r))}),t.qZA(),t.TgZ(23,"ion-button",17),t.NdJ("click",function(){t.CHM(e);const r=t.oxw();return t.KtG(r.onAddLocation())}),t._uU(24,"UBICACI\xd3N ACTUAL"),t.qZA(),t.YNc(25,L,4,3,"ion-row",18),t.qZA()()}if(2&c){const e=t.oxw();t.Q6J("formGroup",e.form),t.xp6(3),t.hij("",e.formActionText," Uso de Cintur\xf3n"),t.xp6(4),t.Q6J("clearInput",!0),t.xp6(4),t.Q6J("clearInput",!0),t.xp6(4),t.Q6J("clearInput",!0),t.xp6(4),t.Q6J("autoGrow",!0),t.xp6(6),t.Q6J("ngIf",e.ImageSrc)}}let H=(()=>{class c{constructor(e,i,r,d,m,v,b,A,x,k,K,R){this.auditoryService=e,this.auditoryEvidenceService=i,this.router=r,this.route=d,this.validFormService=m,this.responseService=v,this.mapService=b,this.photoService=A,this.confirmDialogService=x,this.actionSheetCtrl=k,this.loadingService=K,this.sanitization=R,this.formActionText="Nuevo",this.SubmitButtonText="Comenzar",this.auditoryId="0",this.backUrl=(0,g.CE)(),this.locationAdded=!1,this.hideMap=!0,this.ImageSrc=[]}initForm(){const e=new Date;e.setMinutes(e.getMinutes()-e.getTimezoneOffset()),e.setSeconds(0);const i=e.toISOString().split("T"),r=i[1].split(".");this.form=new s.cw({title:new s.NI("",{validators:[s.kI.required]}),description:new s.NI(""),date:new s.NI(i[0],{validators:[s.kI.required,s.kI.minLength(1)]}),time:new s.NI(r[0],{validators:[s.kI.required,s.kI.minLength(1)]}),lat:new s.NI(""),lng:new s.NI("")})}createAuditory(e){return(0,l.mG)(this,void 0,void 0,function*(){this.auditoryService.localSave(e).subscribe({next:i=>{i!==a.W&&this.auditoryService.getLastSavedId().subscribe({next:r=>(0,l.mG)(this,void 0,void 0,function*(){if(r!==a.W){this.hideMap=!0,this.auditoryId=r.values[0].id;let d=0;this.ImageSrc.length>0?this.ImageSrc.forEach((m,v)=>(0,l.mG)(this,void 0,void 0,function*(){setTimeout(()=>(0,l.mG)(this,void 0,void 0,function*(){this.photoService.saveLocalBeltAuditoryEvidence(m.trueb64,this.auditoryId).then(A=>{this.auditoryEvidenceService.localSave({auditoryId:this.auditoryId,dir:A}).subscribe({next:x=>(0,l.mG)(this,void 0,void 0,function*(){x!==a.W&&(d++,d===this.ImageSrc.length&&this.responseService.onSuccessAndRedirect((0,g.KC)(this.auditoryId),"Registro guardado"))}),error:x=>{this.responseService.onError(x,"No se pudo guardar una imagen")}})}).catch()}),100*v)})):this.responseService.onSuccessAndRedirect((0,g.KC)(this.auditoryId),"Registro guardado")}})})},error:i=>{this.responseService.onError(i,"No se pudo guardar")}})})}updateAuditory(e){this.auditoryService.updateLocal(this.auditoryId,e).subscribe({next:i=>{i!==a.W&&(this.hideMap=!0,this.responseService.onSuccessAndRedirect((0,g.lM)("local"),"Registro actualizado"))},error:i=>{this.responseService.onError(i,"No se pudo actualizar")}})}setAuditory(e){this.backUrl=(0,g.lM)("local"),this.form.setValue({title:e.title,description:e.description,date:e.date,time:e.time,lat:"100.00",lng:"100.00"}),this.auditoryEvidenceService.getEvidencesByAuditory(this.auditoryId).subscribe({next:i=>{i!==a.W&&((0,p.n$)("hybrid")?i.values.forEach(r=>(0,l.mG)(this,void 0,void 0,function*(){this.photoService.getLocalAuditoryEvidenceUri(r.dir).then(d=>{this.ImageSrc.push({id:r.dir,url:C.dV.convertFileSrc(d.uri),base64:"",expand:{width:"25%"}})})})):i.values.forEach(r=>(0,l.mG)(this,void 0,void 0,function*(){this.photoService.getLocalAuditoryEvidence(r.dir).then(d=>{const m="data:image/png;base64,"+d.data;this.ImageSrc.push({id:r.dir,url:m,base64:m,expand:{width:"25%"}})})})))}}),setTimeout(()=>{this.mapService.setCenter(e.lat,e.lng),this.loadingService.dismissLoading()},1e3)}ngOnInit(){this.hideMap=!0}ionViewWillEnter(){this.initForm(),this.route.paramMap.subscribe({next:e=>{let i=e.get("id")||"0";"00"===i&&(this.backUrl=(0,g.lM)("local"),i="0"),"0"!==i&&(this.loadingService.showLoading(),this.auditoryId=i,this.formActionText="Actualizando",this.SubmitButtonText="Guardar",this.auditoryService.getLocalForm(this.auditoryId).subscribe({next:r=>{r!==a.W&&this.setAuditory(r.values[0])},error:r=>{this.responseService.onError(r,"No se pudieron recuperar los datos")}}))}}).unsubscribe()}ionViewWillLeave(){this.formActionText="Nueva",this.SubmitButtonText="Comenzar",this.auditoryId="0",this.locationAdded=!1,this.form=new s.cw({}),this.ImageSrc=[],this.hideMap=!0}onSubmit(){this.validFormService.isValid(this.form,[])&&this.confirmDialogService.presentAlert("\xbfDesea guardar los cambios?",()=>{this.loadingService.showLoading(),this.mapService.setCenter(0,0);const e={title:this.form.controls.title.value,description:this.form.controls.description.value,date:this.form.controls.date.value,time:this.form.controls.time.value,lat:this.form.controls.lat.value,lng:this.form.controls.lng.value};"0"===this.auditoryId?this.createAuditory(e):this.updateAuditory(e)})}onAddLocation(){return(0,l.mG)(this,void 0,void 0,function*(){this.hideMap=!1;const e=yield y.b.getCurrentPosition({enableHighAccuracy:!0});this.mapService.setCenter(e.coords.latitude,e.coords.longitude)})}onCancel(){this.router.navigateByUrl(this.backUrl)}onAddPhoto(){return(0,l.mG)(this,void 0,void 0,function*(){yield(yield this.actionSheetCtrl.create({header:"Opciones",mode:"ios",buttons:[{text:"C\xe1mara",handler:()=>this.fromCamera()},{text:"Galer\xeda",handler:()=>this.fromGallery()},{text:"Cerrar",role:"cancel",data:{action:"cancel"}}]})).present()})}fromGallery(){this.photoService.openGallery().then(e=>(0,l.mG)(this,void 0,void 0,function*(){if("0"===this.auditoryId)for(let i=0;i<e.photos.length;i++)this.ImageSrc.push({id:"",url:this.sanitization.bypassSecurityTrustUrl(e.photos[i].webPath),base64:e.photos[i].webPath,expand:{width:"25%"}});else for(let i=0;i<e.photos.length;i++){const r=e.photos[i].webPath,d=yield fetch(r).then(m=>m.blob());this.photoService.saveLocalBeltAuditoryEvidence(d,this.auditoryId).then(m=>{m!==a.W&&this.auditoryEvidenceService.localSave({auditoryId:this.auditoryId,dir:m}).subscribe({next:v=>(0,l.mG)(this,void 0,void 0,function*(){v!==a.W&&this.auditoryEvidenceService.getLastInsertedDir().subscribe({next:b=>(0,l.mG)(this,void 0,void 0,function*(){b!==a.W&&this.ImageSrc.push({id:b.values[0].dir,url:this.sanitization.bypassSecurityTrustUrl(r),base64:r,expand:{width:"25%"}})})})}),error:v=>{this.responseService.onError(v,"No se pudo guardar una imagen")}})})}}))}fromCamera(){this.photoService.takePicture().then(e=>(0,l.mG)(this,void 0,void 0,function*(){if("0"===this.auditoryId)this.ImageSrc.push({id:"",url:this.sanitization.bypassSecurityTrustUrl(e.webPath||""),base64:e.webPath||"",trueb64:e.base64String,expand:{width:"25%"}});else{const i=e.webPath||"",r=yield fetch(i).then(d=>d.blob());this.photoService.saveLocalBeltAuditoryEvidence(r,this.auditoryId).then(d=>{d!==a.W&&this.auditoryEvidenceService.localSave({auditoryId:this.auditoryId,dir:d}).subscribe({next:m=>(0,l.mG)(this,void 0,void 0,function*(){m!==a.W&&this.auditoryEvidenceService.getLastInsertedDir().subscribe({next:v=>(0,l.mG)(this,void 0,void 0,function*(){v!==a.W&&this.ImageSrc.push({id:v.values[0].dir,url:this.sanitization.bypassSecurityTrustUrl(i),base64:i,expand:{width:"25%"}})})})}),error:m=>{this.responseService.onError(m,"No se pudo guardar una imagen")}})})}}))}onSetCoords(e){this.form.controls.lat.setValue(e.lat),this.form.controls.lng.setValue(e.lng)}onImgClicked(e,i){return(0,l.mG)(this,void 0,void 0,function*(){yield(yield this.actionSheetCtrl.create({header:"Opciones",mode:"ios",buttons:[{text:"Cambiar tama\xf1o",handler:()=>this.onChangeSize(i)},{text:"Eliminar Foto",role:"destructive",handler:()=>this.onRemove(e,i)},{text:"Cerrar",role:"cancel",data:{action:"cancel"}}]})).present()})}onChangeSize(e){this.ImageSrc[e].expand="25%"===this.ImageSrc[e].expand.width?{width:"100%"}:{width:"25%"}}onRemove(e,i){this.confirmDialogService.presentAlert("\xbfDesea eliminar la imagen?",()=>{e?this.auditoryEvidenceService.localRemove(e).subscribe({next:()=>{this.photoService.removeLocalAuditoryEvidence(e).then(()=>this.ImageSrc.splice(i,1))}}):this.ImageSrc.splice(i,1)})}}return c.\u0275fac=function(e){return new(e||c)(t.Y36(h.E),t.Y36(I.G),t.Y36(f.F0),t.Y36(f.gz),t.Y36(T.i),t.Y36(B.J),t.Y36(U.S),t.Y36(Z.T),t.Y36(P.D),t.Y36(u.BX),t.Y36(F.b),t.Y36(G.H7))},c.\u0275cmp=t.Xpm({type:c,selectors:[["app-belt-initial-form"]],decls:11,vars:3,consts:[["homeUrl","/home",3,"backUrl"],[3,"formGroup","ngSubmit",4,"ngIf"],["color","danger","expand","full",3,"click"],["expand","full","type","button",3,"click"],[3,"formGroup","ngSubmit"],[1,"mx-2","mt-4"],[1,"mt-4","txtInput"],["position","floating"],["formControlName","title","type","text","placeholder","Escriba un t\xedtulo",3,"clearInput"],[1,"mt-2","txtInput"],["formControlName","date","type","date","placeholder","Escriba el sentido",3,"clearInput"],["formControlName","time","type","time","placeholder","Escriba el sentido",3,"clearInput"],[1,"mt-2","txtInput","mb-2"],["formControlName","description","type","text","rows","3","placeholder","Agregue una descripci\xf3n",3,"autoGrow"],["formControlName","lat","type","hidden","hidden",""],["formControlName","lng","type","hidden","hidden",""],[3,"centerEvent"],["expand","full","color","light",1,"mt-3",3,"click"],[4,"ngIf"],[3,"size"],[3,"src","ngStyle","click",4,"ngFor","ngForOf"],["class","btn-right","fill","clear","size","large",3,"click",4,"ngIf"],[3,"src","ngStyle","click"],["fill","clear","size","large",1,"btn-right",3,"click"],["slot","icon-only","name","image-outline",1,"icon-color"]],template:function(e,i){1&e&&(t.TgZ(0,"ion-content"),t._UZ(1,"app-header-buttons",0),t.YNc(2,D,26,7,"form",1),t.qZA(),t.TgZ(3,"ion-footer")(4,"ion-row")(5,"ion-col")(6,"ion-button",2),t.NdJ("click",function(){return i.onCancel()}),t._uU(7," CANCELAR "),t.qZA()(),t.TgZ(8,"ion-col")(9,"ion-button",3),t.NdJ("click",function(){return i.onSubmit()}),t._uU(10),t.qZA()()()()),2&e&&(t.xp6(1),t.Q6J("backUrl",i.backUrl),t.xp6(1),t.Q6J("ngIf",i.form),t.xp6(8),t.hij(" ",i.SubmitButtonText," "))},dependencies:[o.sg,o.O5,o.PC,s._Y,s.JJ,s.JL,s.sg,s.u,u.YG,u.wI,u.W2,u.fr,u.gu,u.pK,u.Ie,u.Q$,u.Nd,u.g2,u.j9,M.G,N.$],encapsulation:2}),c})();var Y=n(3375),O=n(1576);const z=[{path:"",component:H}];let W=(()=>{class c{}return c.\u0275fac=function(e){return new(e||c)},c.\u0275mod=t.oAB({type:c}),c.\u0275inj=t.cJS({imports:[o.ez,s.u5,s.UX,u.Pc,f.Bz.forChild(z),Y.R,O.Y]}),c})()}}]);