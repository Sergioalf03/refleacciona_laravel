"use strict";(self.webpackChunkCallesMasSeguras=self.webpackChunkCallesMasSeguras||[]).push([[387],{1387:(v,c,t)=>{t.r(c),t.d(c,{BeltModule:()=>B});var h=t(6814),r=t(594),d=t(5619),e=t(9212),l=t(2529),g=t(677),o=t(2634),u=t(595),m=t(6138);let f=(()=>{class i{constructor(n,a,s,p,y){this.beltService=n,this.responseService=a,this.loadingService=s,this.dateFormatService=p,this.router=y,this.tableRequestBody={page_size:10,page_index:0,order_column:"date",order_direction:"desc",search_key:"",conditions:[]},this.downloadRows=[],this.tableConfig={fullWidth:!0,conditionSelectors:[],headerButtons:[],tableOptions:[],columns:[{class:"",text:"T\xedtulo",key:"title"},{class:"",text:"Descripci\xf3n",key:"description"},{class:"",text:"Fecha",key:"date"},{class:"",text:"Usuario",key:"user"}],rowClick:D=>this.router.navigateByUrl(`/app/belt/detail/${D.id}`)},this.breadCrumbData={title:"Listado de uso de cintur\xf3n",items:[{label:"Uso de cintur\xf3n",active:!0},{label:"Listado",active:!0}]},this.listDataFetched=new d.X(void 0),this.initialLoading=!0,this.loading=!1,this.loadingClount=0,this.getListObservable=this.listDataFetched.asObservable()}ngOnInit(){this.getList()}ngOnDestroy(){this.modalSubscription&&this.modalSubscription.unsubscribe()}getList(){this.loadingService.show(),this.beltService.getList(this.tableRequestBody).subscribe({next:n=>{const a={rows:n.data.list.map(s=>({...s,description:s.description?s.description.substring(0,50):"",date:this.dateFormatService.toShowFormat(`${s.date}T00:00:00.000Z`)})),total:n.data.total};this.downloadRows=a.rows,this.listDataFetched.next(a)},error:n=>this.responseService.onError(n,"No se pudo recuperar la lista")})}static#t=this.\u0275fac=function(a){return new(a||i)(e.Y36(l.i),e.Y36(g.J),e.Y36(o.b),e.Y36(u.f),e.Y36(r.F0))};static#e=this.\u0275cmp=e.Xpm({type:i,selectors:[["app-belt"]],decls:3,vars:4,consts:[[1,"row"],[1,"col-xl-8","offset-xl-2"],[3,"tableConfig","tableRequestBody","breadCrumbData","listDataFetched","fetchList"]],template:function(a,s){1&a&&(e.TgZ(0,"div",0)(1,"div",1)(2,"app-generic-table",2),e.NdJ("fetchList",function(){return s.getList()}),e.qZA()()()),2&a&&(e.xp6(2),e.Q6J("tableConfig",s.tableConfig)("tableRequestBody",s.tableRequestBody)("breadCrumbData",s.breadCrumbData)("listDataFetched",s.listDataFetched))},dependencies:[m.p],encapsulation:2})}return i})();var b=t(7090);const C=[{path:"",component:f},{path:"detail/:id",loadChildren:()=>Promise.all([t.e(342),t.e(679)]).then(t.bind(t,3679)).then(i=>i.BeltDetailModule)}];let B=(()=>{class i{static#t=this.\u0275fac=function(a){return new(a||i)};static#e=this.\u0275mod=e.oAB({type:i});static#s=this.\u0275inj=e.cJS({imports:[h.ez,r.Bz.forChild(C),b.G,r.Bz]})}return i})()},2529:(v,c,t)=>{t.d(c,{i:()=>e});var h=t(9212),r=t(4654);const d="w-belt";let e=(()=>{class l{constructor(o){this.http=o}getList(o){return this.http.post(`${d}/list`,o)}getDetail(o){return this.http.get(`${d}/detail/${o}`)}downloadPdf(o){return this.http.downloadGet(`${d}/pdf/${o}`)}static#t=this.\u0275fac=function(u){return new(u||l)(h.LFG(r.g))};static#e=this.\u0275prov=h.Yz7({token:l,factory:l.\u0275fac,providedIn:"root"})}return l})()}}]);