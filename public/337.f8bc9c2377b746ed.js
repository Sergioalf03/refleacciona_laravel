"use strict";(self.webpackChunkCallesMasSeguras=self.webpackChunkCallesMasSeguras||[]).push([[337],{595:(Ae,se,C)=>{C.d(se,{f:()=>j});var n=C(9212);let j=(()=>{class A{toFillFormat(O,S){O.setDate(O.getDate()+(S?0:1));const M=O.getDate(),B=O.getMonth()+1;return`${O.getFullYear()}-${B<10?`0${B}`:B}-${M<10?`0${M}`:M}`}toFillFormatFromIsoString(O){return`${O.split("T")[0]}`}toShowFormat(O){try{const S=+O.substring(8,10),M=+O.substring(5,7);return`${S<10?`0${S}`:S}/${M<10?`0${M}`:M}/${+O.substring(0,4)}`}catch{return""}}toShowWithTimeFormat(O){const S=+O.substring(8,10),M=+O.substring(5,7);return`${S<10?`0${S}`:S}/${M<10?`0${M}`:M}/${+O.substring(0,4)} ${O.substring(11,16)}`}toOrderFormat(O){const S=+O.substring(8,10),M=+O.substring(5,7);return`${+O.substring(0,4)}/${M<10?`0${M}`:M}/${S<10?`0${S}`:S}`}toOrderWithTimeFormat(O){const S=+O.substring(8,10),M=+O.substring(5,7),B=+O.substring(0,4),w=+O.substring(11,13),x=+O.substring(14,16);return`${B}/${M<10?`0${M}`:M}/${S<10?`0${S}`:S}  ${w<10?`0${w}`:w}:${x<10?`0${x}`:x}`}addMonths(O,S,M,B){let z=S+B%12+1;const re=O+Math.floor(B/12)+(z>12?1:0);z=z>12?z-12:z;let oe=M+1;return oe>28?2===z?(oe=(re-2e3)%4==0?29:28,new Date(re,z-1,oe,0,0,0,0).toISOString()):oe>30&&(4===z||6===z||9===z||11===z)?(oe=30,new Date(re,z-1,oe,0,0,0,0).toISOString()):new Date(re,z-1,oe,0,0,0,0).toISOString():new Date(re,z-1,oe,0,0,0,0).toISOString()}getQuotationCreationDate(O){const w=new Intl.DateTimeFormat("en-US",{year:"numeric",month:"numeric",day:"numeric",hour:"numeric",minute:"numeric",second:"numeric",hour12:!1,timeZone:O||"America/Mexico_City"}).format().split(", "),x=w[0].split("/");return`${x[2]}-${+x[0]<10?`0${x[0]}`:x[0]}-${+x[1]<10?`0${x[1]}`:x[1]}T${w[1]}.000Z`}toGetDateFromLocationServer(O){return`${O.substring(8,10)}/${O.substring(5,7)}/${O.substring(0,4)}`}toGetTimeFromLocationServer(O){return O.substring(10,16)}show12HoursTimeFormat(O){const S=O.split(":"),M=+S[0]>12,B=M?+S[0]-12:+S[0];return`${B<10?`0${B}`:B}:${S[1]} ${M?"PM":"AM"}`}static#e=this.\u0275fac=function(S){return new(S||A)};static#t=this.\u0275prov=n.Yz7({token:A,factory:A.\u0275fac,providedIn:"root"})}return A})()},677:(Ae,se,C)=>{C.d(se,{J:()=>S});var n=C(9212),j=C(2425);let A=(()=>{class M{constructor(w){this.toastService=w}showDanger(w,x){this.toastService.error(w,x||"Error",{timeOut:3e3})}showSuccess(w,x){this.toastService.success(w,x||"\xc9xito",{timeOut:1e3})}static#e=this.\u0275fac=function(x){return new(x||M)(n.LFG(j._W))};static#t=this.\u0275prov=n.Yz7({token:M,factory:M.\u0275fac,providedIn:"root"})}return M})();var Q=C(2634),O=C(594);let S=(()=>{class M{constructor(w,x,z){this.toastService=w,this.loadingService=x,this.router=z}onError(w,x){this.loadingService.hide(),console.log(w),this.toastService.showDanger(409===w.status?w.error.message:x)}onErrorAndRedirect(w,x,z){this.loadingService.hide(),console.log(w),this.toastService.showDanger(409===w.status?w.error.message:x),this.router.navigateByUrl(z)}onSuccess(w){this.loadingService.hide(),this.toastService.showSuccess(w)}onSuccessAndRedirect(w,x){this.loadingService.hide(),this.toastService.showSuccess(w),this.router.navigateByUrl(x)}static#e=this.\u0275fac=function(x){return new(x||M)(n.LFG(A),n.LFG(Q.b),n.LFG(O.F0))};static#t=this.\u0275prov=n.Yz7({token:M,factory:M.\u0275fac,providedIn:"root"})}return M})()},2634:(Ae,se,C)=>{C.d(se,{b:()=>A});var n=C(5619),j=C(9212);let A=(()=>{class Q{constructor(){this.openObservable=new n.X({open:!1})}show(){this.openObservable.next({open:!0})}getOpenObservable(){return this.openObservable.asObservable()}hide(){this.openObservable.next({open:!1})}cleanModalData(){this.openObservable.next({open:!1})}static#e=this.\u0275fac=function(M){return new(M||Q)};static#t=this.\u0275prov=j.Yz7({token:Q,factory:Q.\u0275fac,providedIn:"root"})}return Q})()},4237:(Ae,se,C)=>{C.d(se,{n:()=>O});var n=C(9212),j=C(6814);const A=S=>({active:S});function Q(S,M){if(1&S&&(n.ynx(0),n.TgZ(1,"li",7),n._uU(2),n.qZA(),n.BQk()),2&S){const B=M.$implicit;n.xp6(),n.Q6J("ngClass",n.VKq(2,A,1==B.active)),n.xp6(),n.Oqu(B.label)}}let O=(()=>{class S{constructor(){}ngOnInit(){}static#e=this.\u0275fac=function(w){return new(w||S)};static#t=this.\u0275cmp=n.Xpm({type:S,selectors:[["app-breadcrumbs"]],inputs:{title:"title",breadcrumbItems:"breadcrumbItems"},decls:8,vars:2,consts:[[1,"row","mb-3"],[1,"col-12"],[1,"page-title-box","d-sm-flex","align-items-center","justify-content-between"],[1,"mb-sm-0"],[1,"page-title-right"],[1,"breadcrumb","m-0"],[4,"ngFor","ngForOf"],[1,"breadcrumb-item",3,"ngClass"]],template:function(w,x){1&w&&(n.TgZ(0,"div",0)(1,"div",1)(2,"div",2)(3,"h4",3),n._uU(4),n.qZA(),n.TgZ(5,"div",4)(6,"ol",5),n.YNc(7,Q,3,4,"ng-container",6),n.qZA()()()()()),2&w&&(n.xp6(4),n.Oqu(x.title),n.xp6(3),n.Q6J("ngForOf",x.breadcrumbItems))},dependencies:[j.mk,j.sg],encapsulation:2})}return S})()},6138:(Ae,se,C)=>{C.d(se,{p:()=>D});var n=C(9212),j=C(95),A=C(2634),Q=C(677),O=C(8672),S=C(6814),M=C(4237),B=C(7012),w=C(9321);function x(_,T){1&_&&(n.TgZ(0,"div",2)(1,"div",3)(2,"div",4),n._uU(3,"Cargando listado"),n.qZA(),n.TgZ(4,"div",5)(5,"span",6),n._uU(6,"Loading..."),n.qZA()()()())}function z(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"i",50),n.NdJ("click",function(){n.CHM(u);const g=n.oxw().$implicit,R=n.oxw(3);return n.KtG(R.onHeaderSort(g.key))}),n.qZA()}}function re(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"i",51),n.NdJ("click",function(){n.CHM(u);const g=n.oxw().$implicit,R=n.oxw(3);return n.KtG(R.onHeaderSort(g.key))}),n.qZA()}}function oe(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"i",52),n.NdJ("click",function(){n.CHM(u);const g=n.oxw().$implicit,R=n.oxw(3);return n.KtG(R.onHeaderSort(g.key))}),n.qZA()}}function Je(_,T){if(1&_&&(n.TgZ(0,"th"),n._uU(1),n.YNc(2,z,1,0,"i",47)(3,re,1,0,"i",48)(4,oe,1,0,"i",49),n.qZA()),2&_){const u=T.$implicit,f=n.oxw(3);n.Tol(u.class),n.xp6(),n.hij(" ",u.text," "),n.xp6(),n.Q6J("ngIf",f.tableRequestBody.order_column!==u.key),n.xp6(),n.Q6J("ngIf",f.tableRequestBody.order_column===u.key&&"asc"===f.tableRequestBody.order_direction),n.xp6(),n.Q6J("ngIf",f.tableRequestBody.order_column===u.key&&"desc"===f.tableRequestBody.order_direction)}}function Ye(_,T){if(1&_&&(n.TgZ(0,"td"),n._UZ(1,"ngb-highlight",55),n.qZA()),2&_){const u=T.$implicit,f=n.oxw().$implicit,g=n.oxw(3);n.Tol(u.class),n.xp6(),n.Q6J("result",f[u.key])("term",g.tableRequestBody.search_key.split("|"))}}function qe(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"tr"),n.YNc(1,Ye,2,4,"td",43),n.TgZ(2,"td",44)(3,"button",53),n.NdJ("click",function(){const R=n.CHM(u).$implicit,W=n.oxw(3);return n.KtG(W.tableConfig.rowClick(R))}),n._UZ(4,"i",54),n.qZA()()()}if(2&_){const u=n.oxw(3);n.xp6(),n.Q6J("ngForOf",u.tableConfig.columns)}}function Ie(_,T){if(1&_&&(n.TgZ(0,"div",40)(1,"table",41)(2,"thead",42)(3,"tr"),n.YNc(4,Je,5,6,"th",43),n.TgZ(5,"th",44),n._uU(6,"Opciones"),n.qZA()()(),n.TgZ(7,"tbody",45),n.YNc(8,qe,5,1,"tr",46),n.qZA()()()),2&_){const u=n.oxw(2);n.xp6(4),n.Q6J("ngForOf",u.tableConfig.columns),n.xp6(4),n.Q6J("ngForOf",u.tableData.rows)}}function he(_,T){1&_&&(n.TgZ(0,"div",2)(1,"div",3)(2,"div",4),n._uU(3,"Sin resultados"),n.qZA()()())}function Qe(_,T){if(1&_&&(n.TgZ(0,"tr")(1,"td")(2,"div",62),n._uU(3),n.qZA()(),n.TgZ(4,"td")(5,"div",63),n._UZ(6,"ngb-highlight",55),n.qZA()()()),2&_){const u=T.$implicit,f=n.oxw().$implicit,g=n.oxw(3);n.xp6(3),n.hij(" ",u.text," "),n.xp6(3),n.Q6J("result",f[u.key])("term",g.tableRequestBody.search_key.split("|"))}}function ke(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"div",57)(1,"div",58)(2,"table",59)(3,"tbody",60),n.YNc(4,Qe,7,3,"tr",46),n.TgZ(5,"tr",61)(6,"td")(7,"div",62),n._uU(8," Opciones "),n.qZA()(),n.TgZ(9,"td")(10,"div",63)(11,"button",53),n.NdJ("click",function(){const R=n.CHM(u).$implicit,W=n.oxw(3);return n.KtG(W.tableConfig.rowClick(R))}),n._UZ(12,"i",54),n.qZA()()()()()()()()}if(2&_){const u=n.oxw(3);n.xp6(4),n.Q6J("ngForOf",u.tableConfig.columns)}}function me(_,T){if(1&_&&(n.TgZ(0,"div"),n.YNc(1,ke,13,1,"div",56),n.qZA()),2&_){const u=n.oxw(2);n.xp6(),n.Q6J("ngForOf",u.tableData.rows)}}function xe(_,T){1&_&&n._UZ(0,"div",8)}function Ke(_,T){1&_&&(n.TgZ(0,"div",8)(1,"div",64),n._UZ(2,"i",65),n.TgZ(3,"h5",66),n._uU(4,"Upps! A\xfan no hay registros"),n.qZA()()())}const N=(_,T)=>({"col-12":_,"col-6":T}),V=(_,T)=>({"col-3":_,"col-4":T}),h=(_,T)=>({"col-9":_,"col-8":T});function v(_,T){if(1&_){const u=n.EpF();n.TgZ(0,"div",2)(1,"div",7)(2,"div",8)(3,"div",9)(4,"div",2)(5,"div",10)(6,"div",11)(7,"form",12),n.NdJ("ngSubmit",function(){n.CHM(u);const g=n.oxw();return n.KtG(g.onKey())}),n.TgZ(8,"div",13),n._UZ(9,"input",14),n.TgZ(10,"button",15),n._uU(11,"Buscar"),n.qZA()()(),n._UZ(12,"i",16),n.qZA()(),n._UZ(13,"div",17),n.qZA()(),n.TgZ(14,"div",18),n.YNc(15,Ie,9,2,"div",19)(16,he,4,0,"div",1),n.TgZ(17,"div",20)(18,"div",21)(19,"select",22,23),n.NdJ("change",function(){n.CHM(u);const g=n.MAs(20),R=n.oxw();return n.KtG(R.pageSizeChange(g.value))}),n.TgZ(21,"option"),n._uU(22,"10"),n.qZA(),n.TgZ(23,"option"),n._uU(24,"20"),n.qZA(),n.TgZ(25,"option"),n._uU(26,"50"),n.qZA(),n.TgZ(27,"option"),n._uU(28,"100"),n.qZA()()(),n.TgZ(29,"div",24)(30,"div",25),n._uU(31," Mostrando "),n.TgZ(32,"span",26),n._uU(33),n.qZA(),n._uU(34," de "),n.TgZ(35,"span",26),n._uU(36),n.qZA(),n._uU(37," registros "),n.qZA()(),n.TgZ(38,"div",27)(39,"pagination",28),n.NdJ("ngModelChange",function(g){n.CHM(u);const R=n.oxw();return n.KtG(R.tableData.pageNumber=g)})("pageChanged",function(g){n.CHM(u);const R=n.oxw();return n.KtG(R.pageChanged(g))}),n.qZA()()()(),n.TgZ(40,"div",29)(41,"div",30)(42,"div",31),n._UZ(43,"div",32),n.TgZ(44,"div",33)(45,"div",11)(46,"form",12),n.NdJ("ngSubmit",function(){n.CHM(u);const g=n.oxw();return n.KtG(g.onKey())}),n.TgZ(47,"div",13),n._UZ(48,"input",14),n.TgZ(49,"button",15),n._uU(50,"Buscar"),n.qZA()()(),n._UZ(51,"i",16),n.qZA()()(),n.YNc(52,me,2,1,"div",34),n.TgZ(53,"div",2)(54,"div",35)(55,"div",36),n._uU(56," Mostrando "),n.TgZ(57,"span",26),n._uU(58),n.qZA(),n._uU(59," de "),n.TgZ(60,"span",26),n._uU(61),n.qZA(),n._uU(62," registros "),n.qZA()(),n.TgZ(63,"div",37)(64,"pagination",38),n.NdJ("ngModelChange",function(g){n.CHM(u);const R=n.oxw();return n.KtG(R.tableData.pageNumber=g)})("pageChanged",function(g){n.CHM(u);const R=n.oxw();return n.KtG(R.pageChanged(g))}),n.qZA()()()(),n.YNc(65,xe,1,0,"div",39),n.qZA()(),n.YNc(66,Ke,5,0,"div",39),n.qZA()()}if(2&_){const u=n.oxw();n.xp6(),n.Q6J("ngClass",n.WLB(24,N,u.tableConfig.fullWidth,!u.tableConfig.fullWidth)),n.xp6(4),n.Q6J("ngClass",n.WLB(27,V,u.tableConfig.fullWidth,!u.tableConfig.fullWidth)),n.xp6(2),n.Q6J("formGroup",u.searchFormGroup),n.xp6(6),n.Q6J("ngClass",n.WLB(30,h,u.tableConfig.fullWidth,!u.tableConfig.fullWidth)),n.xp6(2),n.Q6J("ngIf",0!==u.tableData.rows.length),n.xp6(),n.Q6J("ngIf",0===u.tableData.rows.length),n.xp6(17),n.AsE("",u.tableData.startIndex," a ",u.tableData.endIndex,""),n.xp6(3),n.Oqu(u.tableData.total),n.xp6(3),n.Q6J("totalItems",u.tableData.total)("ngModel",u.tableData.pageNumber)("itemsPerPage",u.tableRequestBody.page_size)("maxSize",10),n.xp6(7),n.Q6J("formGroup",u.searchFormGroup),n.xp6(6),n.Q6J("ngIf",!u.loading),n.xp6(6),n.AsE("",u.tableData.startIndex," a ",u.tableData.endIndex," "),n.xp6(3),n.Oqu(u.tableData.total),n.xp6(3),n.Q6J("totalItems",u.tableData.total)("ngModel",u.tableData.pageNumber)("itemsPerPage",u.tableRequestBody.page_size)("maxSize",3),n.xp6(),n.Q6J("ngIf",0===u.tableData.rows.length),n.xp6(),n.Q6J("ngIf",!u.loading&&u.initialLoad&&0===u.tableData.rows.length)}}let D=(()=>{class _{constructor(u,f,g){this.loadingService=u,this.responseService=f,this.spinner=g,this.fetchList=new n.vpe(!1),this.searchFormGroup=new j.cw({searchValue:new j.NI("")}),this.displaySearchSeconds="",this.tableData={rows:[],total:0,startIndex:0,endIndex:0,pageNumber:1},this.loading=!1,this.loadingClount=0,this.requestSended=!1,this.initialLoad=!0}ngOnInit(){this.getListSubscription=this.listDataFetched.subscribe({next:u=>{u&&(this.initialLoad=!1,this.tableData.rows=u.rows,this.tableData.total=u.total,this.tableData.pageNumber=this.tableRequestBody.page_index+1,this.tableData.startIndex=this.tableRequestBody.page_index*this.tableRequestBody.page_size+1,this.tableData.endIndex=this.tableRequestBody.page_index*this.tableRequestBody.page_size+(this.tableData.rows.length<this.tableRequestBody.page_size?this.tableData.rows.length:this.tableRequestBody.page_size),this.loadingService.hide(),this.requestSended=!1)},error:u=>this.responseService.onError(u,"No se pudo recuperar la lista")})}getList(){this.requestSended||(this.requestSended=!0,this.fetchList.emit(!0))}conditionChanged(u,f){this.tableRequestBody.conditions[u]=f,this.getList()}pageSizeChange(u){this.tableRequestBody.page_size=u,this.getList()}onHeaderSort(u,f){this.tableRequestBody.page_index=0,this.tableRequestBody.order_column===u?this.tableRequestBody.order_direction=f||("asc"===this.tableRequestBody.order_direction?"desc":"asc"):(this.tableRequestBody.order_column=u,this.tableRequestBody.order_direction=f||"asc"),this.getList()}onKey(){this.tableRequestBody.search_key=this.searchFormGroup.controls.searchValue.value,this.getList()}pageChanged(u){this.tableRequestBody.page_index=u.page-1,this.tableRequestBody.page_size=u.itemsPerPage,this.getList()}onCleanSearch(){this.searchFormGroup.controls.searchValue.setValue(""),this.onKey()}static#e=this.\u0275fac=function(f){return new(f||_)(n.Y36(A.b),n.Y36(Q.J),n.Y36(O.t2))};static#t=this.\u0275cmp=n.Xpm({type:_,selectors:[["app-generic-table"]],inputs:{DEFAULT_ROW_MODEL:"DEFAULT_ROW_MODEL",tableConfig:"tableConfig",tableRequestBody:"tableRequestBody",breadCrumbData:"breadCrumbData",listDataFetched:"listDataFetched",getListSubscription:"getListSubscription"},outputs:{fetchList:"fetchList"},decls:3,vars:4,consts:[[3,"title","breadcrumbItems"],["class","row",4,"ngIf"],[1,"row"],[1,"col","text-center","mt-5"],[1,"h3"],["role","status",1,"spinner-border"],[1,"visually-hidden"],[1,"col",3,"ngClass"],[1,"card"],[1,"card-body","d-none","d-md-block"],[3,"ngClass"],[1,"search-box"],[3,"formGroup","ngSubmit"],[1,"input-group"],["formControlName","searchValue","type","text","placeholder","Buscar...","aria-label","Buscar...","aria-describedby","button-addon2",1,"form-control","search"],["type","submit","id","button-addon2",1,"btn","btn-primary"],[1,"ri-search-line","search-icon"],[1,"text-end",3,"ngClass"],[1,"card-body","d-none","d-md-block","pb-0","mb-0"],["class"," table-card",4,"ngIf"],["id","pagination-element",1,"row","align-items-center","mt-3","mb-0"],[1,"col-1","m-0","p-0"],[1,"form-select",3,"change"],["pageSelector",""],[1,"col-sm","m-0","p-0"],[1,"text-muted","text-center","text-sm-start","ms-2"],[1,"fw-semibold"],[1,"col-sm-auto","pt-2"],["previousText","Anterior","nextText","Siguiente",1,"pagination-wrap","hstack","justify-content-center",3,"totalItems","ngModel","itemsPerPage","maxSize","ngModelChange","pageChanged"],[1,"d-block","d-md-none"],[1,"container","mx-auto","px-0"],[1,"row","align-items-center","mt-2"],[1,"col-12","px-3","mb-2","d-grid","gap-2"],[1,"col-12","px-3","mt-2"],[4,"ngIf"],[1,"col-sm"],[1,"text-muted","text-center","text-sm-start"],[1,"col-sm-auto","mt-3","mt-sm-0"],["previousText","Anterior","nextText","Siguiente",1,"pagination-wrap","hstack","justify-content-center","gap-2",3,"totalItems","ngModel","itemsPerPage","maxSize","ngModelChange","pageChanged"],["class","card",4,"ngIf"],[1,"table-card"],[1,"table","table-centered","align-middle","table-custom-effect","table-nowrap","mb-0"],[1,"text-muted"],[3,"class",4,"ngFor","ngForOf"],[1,"text-end"],[1,"list","form-check-all"],[4,"ngFor","ngForOf"],["class","pointer ph-arrows-down-up-bold",3,"click",4,"ngIf"],["class","pointer ph-arrow-down-bold",3,"click",4,"ngIf"],["class","pointer ph-arrow-up-bold",3,"click",4,"ngIf"],[1,"pointer","ph-arrows-down-up-bold",3,"click"],[1,"pointer","ph-arrow-down-bold",3,"click"],[1,"pointer","ph-arrow-up-bold",3,"click"],["type","button",1,"btn","btn-primary","p-0","px-1","text-center",3,"click"],[1,"ph-eye-bold","mt-1"],[3,"result","term"],["class","card border-bottom border border-1 my-3",4,"ngFor","ngForOf"],[1,"card","border-bottom","border","border-1","my-3"],[1,"card-body","m-0","p-0"],[1,"table","m-0","p-0"],[1,"my-0","py-0"],[1,"text-start"],[1,"text-primary","fw-semibold"],[1,"d-flex","justify-content-end"],[1,"text-center","py-4"],[1,"ph-magnifying-glass","fs-1","text-primary"],[1,"mt-2"]],template:function(f,g){1&f&&(n._UZ(0,"app-breadcrumbs",0),n.YNc(1,x,7,0,"div",1)(2,v,67,33,"div",1)),2&f&&(n.Q6J("title",g.breadCrumbData.title)("breadcrumbItems",g.breadCrumbData.items),n.xp6(),n.Q6J("ngIf",g.initialLoad),n.xp6(),n.Q6J("ngIf",!g.initialLoad))},dependencies:[S.mk,S.sg,S.O5,M.n,B.Qt,w._h,j._Y,j.YN,j.Kr,j.Fj,j.JJ,j.JL,j.On,j.sg,j.u],encapsulation:2})}return _})()},7090:(Ae,se,C)=>{C.d(se,{G:()=>T});var n=C(6814),j=C(6208),A=C(9212);let N=(()=>{class u{}return u.\u0275fac=function(g){return new(g||u)},u.\u0275mod=A.oAB({type:u}),u.\u0275inj=A.cJS({imports:[[n.ez]]}),u})();var V=C(7012),h=C(9321),v=C(95),D=C(2500),_=C(8672);let T=(()=>{class u{static#e=this.\u0275fac=function(R){return new(R||u)};static#t=this.\u0275mod=A.oAB({type:u});static#n=this.\u0275inj=A.cJS({imports:[n.ez,j.m,N,V.u3,h.ZS,v.u5,v.UX,D.mr,_.ef.forRoot({type:"ball-scale-multiple"})]})}return u})()},9321:(Ae,se,C)=>{C.d(se,{_h:()=>ll,ZS:()=>ki});var n=C(9212);C(5592),C(9773),C(6232),C(2096),C(8645),C(2438);var z=C(1954);new(C(9931).v)(z.o),C(671),C(4829);function ca(t,s){if(1&t&&(n.TgZ(0,"span"),n._uU(1),n.qZA()),2&t){const e=n.oxw().$implicit,i=n.oxw();n.Tol(i.highlightClass),n.xp6(),n.Oqu(e)}}function da(t,s){if(1&t&&(n.ynx(0),n._uU(1),n.BQk()),2&t){const e=n.oxw().$implicit;n.xp6(),n.Oqu(e)}}function ua(t,s){1&t&&n.YNc(0,ca,2,4,"span",0)(1,da,2,1),2&t&&n.um2(0,s.$index%2!=0?0:1)}C(8251),C(3019),C(9940),C(5211),C(2181),C(8180),C(9397),C(7398),C(9360),C(2737),C(2420),C(975),C(1631),C(4664),C(7921),C(6814),C(95),Math,Math,Math;function $n(t){return null!=t?`${t}`:""}function Zn(t){return t.normalize("NFD").replace(/[\u0300-\u036f]/g,"")}typeof navigator<"u"&&navigator.userAgent&&(/iPad|iPhone|iPod/.test(navigator.userAgent)||/Macintosh/.test(navigator.userAgent)&&navigator.maxTouchPoints&&navigator.maxTouchPoints>2||/Android/.test(navigator.userAgent)),["a[href]","button:not([disabled])",'input:not([disabled]):not([type="hidden"])',"select:not([disabled])","textarea:not([disabled])","[contenteditable]",'[tabindex]:not([tabindex="-1"])'].join(", "),new Date(1882,10,12),new Date(2174,10,25);let ll=(()=>{class t{constructor(){this.highlightClass="ngb-highlight",this.accentSensitive=!0}ngOnChanges(e){!this.accentSensitive&&!String.prototype.normalize&&(console.warn("The `accentSensitive` input in `ngb-highlight` cannot be set to `false` in a browser that does not implement the `String.normalize` function. You will have to include a polyfill in your application to use this feature in the current browser."),this.accentSensitive=!0);const i=$n(this.result),o=Array.isArray(this.term)?this.term:[this.term],a=d=>this.accentSensitive?d:Zn(d),r=o.map(d=>function ma(t){return t.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&")}(a($n(d)))).filter(d=>d),l=this.accentSensitive?i:Zn(i),c=r.length?l.split(new RegExp(`(${r.join("|")})`,"gmi")):[i];if(this.accentSensitive)this.parts=c;else{let d=0;this.parts=c.map(p=>i.substring(d,d+=p.length))}}static#e=this.\u0275fac=function(i){return new(i||t)};static#t=this.\u0275cmp=n.Xpm({type:t,selectors:[["ngb-highlight"]],inputs:{highlightClass:"highlightClass",result:"result",term:"term",accentSensitive:"accentSensitive"},standalone:!0,features:[n.TTD,n.jDz],decls:2,vars:0,consts:[[3,"class"]],template:function(i,o){1&i&&n.SjG(0,ua,2,1,null,null,n.x6l),2&i&&n.wJu(o.parts)},styles:[".ngb-highlight{font-weight:700}\n"],encapsulation:2,changeDetection:0})}return t})();new n.OlP("live announcer delay",{providedIn:"root",factory:()=>100});let ki=(()=>{class t{static#e=this.\u0275fac=function(i){return new(i||t)};static#t=this.\u0275mod=n.oAB({type:t});static#n=this.\u0275inj=n.cJS({})}return t})()},7012:(Ae,se,C)=>{C.d(se,{Qt:()=>xe,u3:()=>Ke});var n=C(9212),j=C(95),A=C(6814);const Q=(N,V)=>({"pull-left":N,"float-left":V}),O=(N,V)=>({"pull-right":N,"float-right":V}),S=(N,V)=>({disabled:N,currentPage:V});function M(N,V){if(1&N){const h=n.EpF();n.TgZ(0,"li",11)(1,"a",12),n.NdJ("click",function(D){n.CHM(h);const _=n.oxw();return n.KtG(_.selectPage(1,D))}),n.GkF(2,13),n.qZA()()}if(2&N){const h=n.oxw(),v=n.MAs(13);n.ekj("disabled",h.noPrevious()||h.disabled),n.xp6(2),n.Q6J("ngTemplateOutlet",h.customFirstTemplate||v)("ngTemplateOutletContext",n.WLB(4,S,h.noPrevious()||h.disabled,h.page))}}function B(N,V){if(1&N){const h=n.EpF();n.TgZ(0,"li",14)(1,"a",12),n.NdJ("click",function(D){n.CHM(h);const _=n.oxw();return n.KtG(_.selectPage(_.page-1,D))}),n.GkF(2,13),n.qZA()()}if(2&N){const h=n.oxw(),v=n.MAs(11);n.ekj("disabled",h.noPrevious()||h.disabled),n.xp6(2),n.Q6J("ngTemplateOutlet",h.customPreviousTemplate||v)("ngTemplateOutletContext",n.WLB(4,S,h.noPrevious()||h.disabled,h.page))}}const w=(N,V,h)=>({disabled:N,$implicit:V,currentPage:h});function x(N,V){if(1&N){const h=n.EpF();n.TgZ(0,"li",15)(1,"a",12),n.NdJ("click",function(D){const T=n.CHM(h).$implicit,u=n.oxw();return n.KtG(u.selectPage(T.number,D))}),n.GkF(2,13),n.qZA()()}if(2&N){const h=V.$implicit,v=n.oxw(),D=n.MAs(7);n.ekj("active",h.active)("disabled",v.disabled&&!h.active),n.xp6(2),n.Q6J("ngTemplateOutlet",v.customPageTemplate||D)("ngTemplateOutletContext",n.kEZ(6,w,v.disabled,h,v.page))}}function z(N,V){if(1&N){const h=n.EpF();n.TgZ(0,"li",16)(1,"a",12),n.NdJ("click",function(D){n.CHM(h);const _=n.oxw();return n.KtG(_.selectPage(_.page+1,D))}),n.GkF(2,13),n.qZA()()}if(2&N){const h=n.oxw(),v=n.MAs(9);n.ekj("disabled",h.noNext()||h.disabled),n.xp6(2),n.Q6J("ngTemplateOutlet",h.customNextTemplate||v)("ngTemplateOutletContext",n.WLB(4,S,h.noNext()||h.disabled,h.page))}}function re(N,V){if(1&N){const h=n.EpF();n.TgZ(0,"li",17)(1,"a",12),n.NdJ("click",function(D){n.CHM(h);const _=n.oxw();return n.KtG(_.selectPage(_.totalPages,D))}),n.GkF(2,13),n.qZA()()}if(2&N){const h=n.oxw(),v=n.MAs(15);n.ekj("disabled",h.noNext()||h.disabled),n.xp6(2),n.Q6J("ngTemplateOutlet",h.customLastTemplate||v)("ngTemplateOutletContext",n.WLB(4,S,h.noNext()||h.disabled,h.page))}}function oe(N,V){1&N&&n._uU(0),2&N&&n.Oqu(V.$implicit.text)}function Je(N,V){if(1&N&&n._uU(0),2&N){const h=n.oxw();n.Oqu(h.getText("next"))}}function Ye(N,V){if(1&N&&n._uU(0),2&N){const h=n.oxw();n.Oqu(h.getText("previous"))}}function qe(N,V){if(1&N&&n._uU(0),2&N){const h=n.oxw();n.Oqu(h.getText("first"))}}function Ie(N,V){if(1&N&&n._uU(0),2&N){const h=n.oxw();n.Oqu(h.getText("last"))}}let he=(()=>{class N{constructor(){this.main={itemsPerPage:10,boundaryLinks:!1,directionLinks:!0,firstText:"First",previousText:"Previous",nextText:"Next",lastText:"Last",pageBtnClass:"",rotate:!0},this.pager={itemsPerPage:15,previousText:"\xab Previous",nextText:"Next \xbb",pageBtnClass:"",align:!0}}static#e=this.\u0275fac=function(v){return new(v||N)};static#t=this.\u0275prov=n.Yz7({token:N,factory:N.\u0275fac,providedIn:"root"})}return N})();const Qe={provide:j.JU,useExisting:(0,n.Gpc)(()=>ke),multi:!0};let ke=(()=>{class N{constructor(h,v,D){this.elementRef=h,this.changeDetection=D,this.align=!1,this.boundaryLinks=!1,this.directionLinks=!0,this.firstText="First",this.previousText="\xab Previous",this.nextText="Next \xbb",this.lastText="Last",this.rotate=!0,this.pageBtnClass="",this.disabled=!1,this.numPages=new n.vpe,this.pageChanged=new n.vpe,this.onChange=Function.prototype,this.onTouched=Function.prototype,this.classMap="",this.inited=!1,this._itemsPerPage=15,this._totalItems=0,this._totalPages=0,this._page=1,this.elementRef=h,this.config||this.configureOptions(Object.assign({},v.main,v.pager))}get itemsPerPage(){return this._itemsPerPage}set itemsPerPage(h){this._itemsPerPage=h,this.totalPages=this.calculateTotalPages()}get totalItems(){return this._totalItems}set totalItems(h){this._totalItems=h,this.totalPages=this.calculateTotalPages()}get totalPages(){return this._totalPages}set totalPages(h){this._totalPages=h,this.numPages.emit(h),this.inited&&this.selectPage(this.page)}get page(){return this._page}set page(h){const v=this._page;this._page=h>this.totalPages?this.totalPages:h||1,this.changeDetection.markForCheck(),!(v===this._page||typeof v>"u")&&this.pageChanged.emit({page:this._page,itemsPerPage:this.itemsPerPage})}configureOptions(h){this.config=Object.assign({},h)}ngOnInit(){typeof window<"u"&&(this.classMap=this.elementRef.nativeElement.getAttribute("class")||""),typeof this.maxSize>"u"&&(this.maxSize=this.config?.maxSize||0),typeof this.rotate>"u"&&(this.rotate=!!this.config?.rotate),typeof this.boundaryLinks>"u"&&(this.boundaryLinks=!!this.config?.boundaryLinks),typeof this.directionLinks>"u"&&(this.directionLinks=!!this.config?.directionLinks),typeof this.pageBtnClass>"u"&&(this.pageBtnClass=this.config?.pageBtnClass||""),typeof this.itemsPerPage>"u"&&(this.itemsPerPage=this.config?.itemsPerPage||0),this.totalPages=this.calculateTotalPages(),this.pages=this.getPages(this.page,this.totalPages),this.inited=!0}writeValue(h){this.page=h,this.pages=this.getPages(this.page,this.totalPages)}getText(h){return this[`${h}Text`]||this.config[`${h}Text`]}noPrevious(){return 1===this.page}noNext(){return this.page===this.totalPages}registerOnChange(h){this.onChange=h}registerOnTouched(h){this.onTouched=h}selectPage(h,v){v&&v.preventDefault(),this.disabled||(v&&v.target&&v.target.blur(),this.writeValue(h),this.onChange(this.page))}makePage(h,v,D){return{text:v,number:h,active:D}}getPages(h,v){const D=[];let _=1,T=v;const u=typeof this.maxSize<"u"&&this.maxSize<v;u&&this.maxSize&&(this.rotate?(_=Math.max(h-Math.floor(this.maxSize/2),1),T=_+this.maxSize-1,T>v&&(T=v,_=T-this.maxSize+1)):(_=(Math.ceil(h/this.maxSize)-1)*this.maxSize+1,T=Math.min(_+this.maxSize-1,v)));for(let f=_;f<=T;f++){const g=this.makePage(f,f.toString(),f===h);D.push(g)}if(u&&!this.rotate){if(_>1){const f=this.makePage(_-1,"...",!1);D.unshift(f)}if(T<v){const f=this.makePage(T+1,"...",!1);D.push(f)}}return D}calculateTotalPages(){const h=this.itemsPerPage<1?1:Math.ceil(this.totalItems/this.itemsPerPage);return Math.max(h||0,1)}static#e=this.\u0275fac=function(v){return new(v||N)(n.Y36(n.SBq),n.Y36(he),n.Y36(n.sBO))};static#t=this.\u0275cmp=n.Xpm({type:N,selectors:[["pager"]],inputs:{align:"align",maxSize:"maxSize",boundaryLinks:"boundaryLinks",directionLinks:"directionLinks",firstText:"firstText",previousText:"previousText",nextText:"nextText",lastText:"lastText",rotate:"rotate",pageBtnClass:"pageBtnClass",disabled:"disabled",itemsPerPage:"itemsPerPage",totalItems:"totalItems"},outputs:{numPages:"numPages",pageChanged:"pageChanged"},features:[n._Bn([Qe])],decls:7,vars:24,consts:[[1,"pager"],[3,"ngClass"],["href","",3,"click"]],template:function(v,D){1&v&&(n.TgZ(0,"ul",0)(1,"li",1)(2,"a",2),n.NdJ("click",function(T){return D.selectPage(D.page-1,T)}),n._uU(3),n.qZA()(),n.TgZ(4,"li",1)(5,"a",2),n.NdJ("click",function(T){return D.selectPage(D.page+1,T)}),n._uU(6),n.qZA()()()),2&v&&(n.xp6(),n.Tol(D.pageBtnClass),n.ekj("disabled",D.noPrevious())("previous",D.align),n.Q6J("ngClass",n.WLB(18,Q,D.align,D.align)),n.xp6(2),n.Oqu(D.getText("previous")),n.xp6(),n.Tol(D.pageBtnClass),n.ekj("disabled",D.noNext())("next",D.align),n.Q6J("ngClass",n.WLB(21,O,D.align,D.align)),n.xp6(2),n.Oqu(D.getText("next")))},dependencies:[A.mk],encapsulation:2})}return N})();const me={provide:j.JU,useExisting:(0,n.Gpc)(()=>xe),multi:!0};let xe=(()=>{class N{constructor(h,v,D){this.elementRef=h,this.changeDetection=D,this.align=!0,this.boundaryLinks=!1,this.directionLinks=!0,this.rotate=!0,this.pageBtnClass="",this.disabled=!1,this.numPages=new n.vpe,this.pageChanged=new n.vpe,this.onChange=Function.prototype,this.onTouched=Function.prototype,this.classMap="",this.inited=!1,this._itemsPerPage=10,this._totalItems=0,this._totalPages=0,this._page=1,this.elementRef=h,this.config||this.configureOptions(v.main)}get itemsPerPage(){return this._itemsPerPage}set itemsPerPage(h){this._itemsPerPage=h,this.totalPages=this.calculateTotalPages()}get totalItems(){return this._totalItems}set totalItems(h){this._totalItems=h,this.totalPages=this.calculateTotalPages()}get totalPages(){return this._totalPages}set totalPages(h){this._totalPages=h,this.numPages.emit(h),this.inited&&this.selectPage(this.page)}get page(){return this._page}set page(h){const v=this._page;this._page=h>this.totalPages?this.totalPages:h||1,this.changeDetection.markForCheck(),!(v===this._page||typeof v>"u")&&this.pageChanged.emit({page:this._page,itemsPerPage:this.itemsPerPage})}configureOptions(h){this.config=Object.assign({},h)}ngOnInit(){typeof window<"u"&&(this.classMap=this.elementRef.nativeElement.getAttribute("class")||""),typeof this.maxSize>"u"&&(this.maxSize=this.config?.maxSize||0),typeof this.rotate>"u"&&(this.rotate=!!this.config?.rotate),typeof this.boundaryLinks>"u"&&(this.boundaryLinks=!!this.config?.boundaryLinks),typeof this.directionLinks>"u"&&(this.directionLinks=!!this.config?.directionLinks),typeof this.pageBtnClass>"u"&&(this.pageBtnClass=this.config?.pageBtnClass||""),typeof this.itemsPerPage>"u"&&(this.itemsPerPage=this.config?.itemsPerPage||0),this.totalPages=this.calculateTotalPages(),this.pages=this.getPages(this.page,this.totalPages),this.inited=!0}writeValue(h){this.page=h,this.pages=this.getPages(this.page,this.totalPages)}getText(h){return this[`${h}Text`]||this.config[`${h}Text`]}noPrevious(){return 1===this.page}noNext(){return this.page===this.totalPages}registerOnChange(h){this.onChange=h}registerOnTouched(h){this.onTouched=h}selectPage(h,v){v&&v.preventDefault(),this.disabled||(v&&v.target&&v.target.blur(),this.writeValue(h),this.onChange(this.page))}makePage(h,v,D){return{text:v,number:h,active:D}}getPages(h,v){const D=[];let _=1,T=v;const u=typeof this.maxSize<"u"&&this.maxSize<v;u&&this.maxSize&&(this.rotate?(_=Math.max(h-Math.floor(this.maxSize/2),1),T=_+this.maxSize-1,T>v&&(T=v,_=T-this.maxSize+1)):(_=(Math.ceil(h/this.maxSize)-1)*this.maxSize+1,T=Math.min(_+this.maxSize-1,v)));for(let f=_;f<=T;f++){const g=this.makePage(f,f.toString(),f===h);D.push(g)}if(u&&!this.rotate){if(_>1){const f=this.makePage(_-1,"...",!1);D.unshift(f)}if(T<v){const f=this.makePage(T+1,"...",!1);D.push(f)}}return D}calculateTotalPages(){const h=this.itemsPerPage<1?1:Math.ceil(this.totalItems/this.itemsPerPage);return Math.max(h||0,1)}static#e=this.\u0275fac=function(v){return new(v||N)(n.Y36(n.SBq),n.Y36(he),n.Y36(n.sBO))};static#t=this.\u0275cmp=n.Xpm({type:N,selectors:[["pagination"]],inputs:{align:"align",maxSize:"maxSize",boundaryLinks:"boundaryLinks",directionLinks:"directionLinks",firstText:"firstText",previousText:"previousText",nextText:"nextText",lastText:"lastText",rotate:"rotate",pageBtnClass:"pageBtnClass",disabled:"disabled",customPageTemplate:"customPageTemplate",customNextTemplate:"customNextTemplate",customPreviousTemplate:"customPreviousTemplate",customFirstTemplate:"customFirstTemplate",customLastTemplate:"customLastTemplate",itemsPerPage:"itemsPerPage",totalItems:"totalItems"},outputs:{numPages:"numPages",pageChanged:"pageChanged"},features:[n._Bn([me])],decls:16,vars:6,consts:[[1,"pagination",3,"ngClass"],["class","pagination-first page-item",3,"disabled",4,"ngIf"],["class","pagination-prev page-item",3,"disabled",4,"ngIf"],["class","pagination-page page-item",3,"active","disabled",4,"ngFor","ngForOf"],["class","pagination-next page-item",3,"disabled",4,"ngIf"],["class","pagination-last page-item",3,"disabled",4,"ngIf"],["defaultPageTemplate",""],["defaultNextTemplate",""],["defaultPreviousTemplate",""],["defaultFirstTemplate",""],["defaultLastTemplate",""],[1,"pagination-first","page-item"],["href","",1,"page-link",3,"click"],[3,"ngTemplateOutlet","ngTemplateOutletContext"],[1,"pagination-prev","page-item"],[1,"pagination-page","page-item"],[1,"pagination-next","page-item"],[1,"pagination-last","page-item"]],template:function(v,D){1&v&&(n.TgZ(0,"ul",0),n.YNc(1,M,3,7,"li",1)(2,B,3,7,"li",2)(3,x,3,10,"li",3)(4,z,3,7,"li",4)(5,re,3,7,"li",5),n.qZA(),n.YNc(6,oe,1,1,"ng-template",null,6,n.W1O)(8,Je,1,1,"ng-template",null,7,n.W1O)(10,Ye,1,1,"ng-template",null,8,n.W1O)(12,qe,1,1,"ng-template",null,9,n.W1O)(14,Ie,1,1,"ng-template",null,10,n.W1O)),2&v&&(n.Q6J("ngClass",D.classMap),n.xp6(),n.Q6J("ngIf",D.boundaryLinks),n.xp6(),n.Q6J("ngIf",D.directionLinks),n.xp6(),n.Q6J("ngForOf",D.pages),n.xp6(),n.Q6J("ngIf",D.directionLinks),n.xp6(),n.Q6J("ngIf",D.boundaryLinks))},dependencies:[A.mk,A.sg,A.O5,A.tP],encapsulation:2})}return N})(),Ke=(()=>{class N{static forRoot(){return{ngModule:N,providers:[]}}static#e=this.\u0275fac=function(v){return new(v||N)};static#t=this.\u0275mod=n.oAB({type:N});static#n=this.\u0275inj=n.cJS({imports:[A.ez]})}return N})()}}]);