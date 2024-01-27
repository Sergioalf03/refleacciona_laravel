"use strict";(self.webpackChunkCallesMasSeguras=self.webpackChunkCallesMasSeguras||[]).push([[869],{869:(p,d,t)=>{t.r(d),t.d(d,{HelmetModule:()=>y});var c=t(6814),h=t(5619),e=t(9212),u=t(2354),n=t(677),v=t(2634),o=t(595),r=t(594),g=t(6138);let f=(()=>{class a{constructor(l,i,s,m,D){this.helmetService=l,this.responseService=i,this.loadingService=s,this.dateFormatService=m,this.router=D,this.tableRequestBody={page_size:10,page_index:0,order_column:"date",order_direction:"desc",search_key:"",conditions:[]},this.downloadRows=[],this.tableConfig={fullWidth:!0,conditionSelectors:[],headerButtons:[],tableOptions:[],columns:[{class:"",text:"T\xedtulo",key:"title"},{class:"",text:"Descripci\xf3n",key:"description"},{class:"",text:"Fecha",key:"date"},{class:"",text:"Usuario",key:"user"}],rowClick:S=>this.router.navigateByUrl(`/app/helmet/detail/${S.id}`)},this.breadCrumbData={title:"Listado de uso de casco",items:[{label:"Uso de casco",active:!0},{label:"Listado",active:!0}]},this.listDataFetched=new h.X(void 0),this.initialLoading=!0,this.loading=!1,this.loadingClount=0,this.getListObservable=this.listDataFetched.asObservable()}ngOnInit(){this.getList()}ngOnDestroy(){this.modalSubscription&&this.modalSubscription.unsubscribe()}getList(){this.loadingService.show(),this.helmetService.getList(this.tableRequestBody).subscribe({next:l=>{const i={rows:l.data.list.map(s=>({...s,description:s.description?s.description.substring(0,50):"",date:this.dateFormatService.toShowFormat(`${s.date}T00:00:00.000Z`)})),total:l.data.total};this.downloadRows=i.rows,this.listDataFetched.next(i)},error:l=>this.responseService.onError(l,"No se pudo recuperar la lista")})}static#t=this.\u0275fac=function(i){return new(i||a)(e.Y36(u.v),e.Y36(n.J),e.Y36(v.b),e.Y36(o.f),e.Y36(r.F0))};static#e=this.\u0275cmp=e.Xpm({type:a,selectors:[["app-helmet"]],decls:3,vars:4,consts:[[1,"row"],[1,"col-xl-8","offset-xl-2"],[3,"tableConfig","tableRequestBody","breadCrumbData","listDataFetched","fetchList"]],template:function(i,s){1&i&&(e.TgZ(0,"div",0)(1,"div",1)(2,"app-generic-table",2),e.NdJ("fetchList",function(){return s.getList()}),e.qZA()()()),2&i&&(e.xp6(2),e.Q6J("tableConfig",s.tableConfig)("tableRequestBody",s.tableRequestBody)("breadCrumbData",s.breadCrumbData)("listDataFetched",s.listDataFetched))},dependencies:[g.p],encapsulation:2})}return a})();var b=t(7090);const C=[{path:"",component:f},{path:"detail/:id",loadChildren:()=>Promise.all([t.e(342),t.e(731)]).then(t.bind(t,3731)).then(a=>a.HelmetDetailModule)}];let y=(()=>{class a{static#t=this.\u0275fac=function(i){return new(i||a)};static#e=this.\u0275mod=e.oAB({type:a});static#s=this.\u0275inj=e.cJS({imports:[c.ez,r.Bz.forChild(C),b.G,r.Bz]})}return a})()},2354:(p,d,t)=>{t.d(d,{v:()=>u});var c=t(9212),h=t(4654);const e="w-helmet";let u=(()=>{class n{constructor(o){this.http=o}getList(o){return this.http.post(`${e}/list`,o)}getDetail(o){return this.http.get(`${e}/detail/${o}`)}downloadPdf(o){return this.http.downloadGet(`${e}/pdf/${o}`)}static#t=this.\u0275fac=function(r){return new(r||n)(c.LFG(h.g))};static#e=this.\u0275prov=c.Yz7({token:n,factory:n.\u0275fac,providedIn:"root"})}return n})()}}]);