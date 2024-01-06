"use strict";(self.webpackChunkapp=self.webpackChunkapp||[]).push([[2688],{2688:(F,p,a)=>{a.r(p),a.d(p,{HomePageModule:()=>B});var _=a(6895),S=a(433),c=a(4731),U=a(655),l=a(7368),f=a(313),e=a(8256),A=a(928),$=a(2414),H=a(3269),T=a(1433),y=a(9641);const b="/version";let P=(()=>{class n{constructor(t){this.http=t,this.checked=!1}checkLastVersion(){return this.http.get(`${b}/last`)}getNewVersion(){return this.http.get(`${b}/get-last-version`)}}return n.\u0275fac=function(t){return new(t||n)(e.LFG(y.g))},n.\u0275prov=e.Yz7({token:n,factory:n.\u0275fac,providedIn:"root"}),n})();var E=a(6280),N=a(2424);function x(n,d){if(1&n){const t=e.EpF();e.TgZ(0,"ion-content")(1,"ion-list",15)(2,"ion-item",16),e.NdJ("click",function(){e.CHM(t);const i=e.oxw();return e.KtG(i.onOpenUser())}),e.TgZ(3,"ion-label"),e._uU(4,"Datos de Usuario"),e.qZA()(),e.TgZ(5,"ion-item",16),e.NdJ("click",function(){e.CHM(t);const i=e.oxw();return e.KtG(i.onFetchUpdate(!0))}),e.TgZ(6,"ion-label"),e._uU(7,"Buscar actualizaci\xf3n"),e.qZA()(),e.TgZ(8,"ion-item",16),e.NdJ("click",function(){e.CHM(t);const i=e.oxw();return e.KtG(i.onLogout())}),e.TgZ(9,"ion-label"),e._uU(10,"Salir"),e.qZA()()()()}}function k(n,d){if(1&n){const t=e.EpF();e.TgZ(0,"ion-button",13),e.NdJ("click",function(){e.CHM(t);const i=e.oxw();return e.KtG(i.onAuditoryList())}),e._uU(1,"Ver"),e.qZA()}}function L(n,d){if(1&n){const t=e.EpF();e.TgZ(0,"ion-button",13),e.NdJ("click",function(){e.CHM(t);const i=e.oxw();return e.KtG(i.onAuditoryList())}),e._uU(1,"Ver \xa0"),e.TgZ(2,"ion-badge",17),e._uU(3),e.qZA()()}if(2&n){const t=e.oxw();e.xp6(3),e.Oqu(t.auditoriesCount)}}const C=[{path:"",component:(()=>{class n{constructor(t,r,i,m,u,g,o,s){this.sessionService=t,this.httpResponseService=r,this.databaseService=i,this.router=m,this.versionService=u,this.confirmDialogService=g,this.loadingService=o,this.platform=s,this.auditoriesCount=0,this.initPlugin=!1,this.platform.backButton.subscribeWithPriority(9999,()=>{})}checkPermissions(){}ionViewDidEnter(){this.versionService.checked||this.onFetchUpdate(!1)}importQuestions(t,r,i){let m="",u=0;const g=`INSERT INTO versions (name, number) VALUES ("${i}", "${i}"); `;t.length>0?t.forEach((o,s,v)=>{setTimeout(()=>{this.databaseService.executeQuery(`SELECT * FROM questions WHERE uid = "${o.uid}"`).subscribe({next:h=>{h!==f.W&&(m+=0===h.values.length?`INSERT INTO questions (section_id, uid, score, cond, has_evidence, indx, status, sentence, answers, popup) VALUES (${o.section_id}, "${o.uid}", ${o.score}, "${o.cond}", ${o.has_evidence}, ${o.indx}, ${o.status}, "${o.sentence}", '${o.answers}', "${o.popup}"); `:`UPDATE questions SET uid = "${o.uid}", score = ${o.score}, cond = "${o.cond}", has_evidence = ${o.has_evidence}, indx = ${o.indx}, status = ${o.status}, sentence = "${o.sentence}", answers = '${o.answers}', popup = "${o.popup}" WHERE uid = "${o.uid}"; `,u++,u===v.length&&this.updateAuditories(r+m+g))}})},50*s)}):this.updateAuditories(r+m+g)}updateAuditories(t){this.databaseService.executeQuery(t).subscribe({next:()=>{this.httpResponseService.onSuccess("Se instal\xf3 la nueva versi\xf3n")}})}onLogout(){this.confirmDialogService.presentAlert("\xbfDesea cerrar sesi\xf3n?",()=>(0,U.mG)(this,void 0,void 0,function*(){return this.loadingService.showLoading(),yield this.sessionService.logout().subscribe({next:()=>{this.router.navigateByUrl((0,l.T8)()),this.loadingService.dismissLoading()},error:t=>{this.httpResponseService.onError(t,"Error al cerrar sesi\xf3n")}})}))}onNewAuditory(){this.router.navigateByUrl((0,l.bD)("0"))}onAuditoryList(){this.router.navigateByUrl((0,l.Zh)("local"))}onNewHelmet(){this.router.navigateByUrl((0,l.iB)("0"))}onHelmetList(){this.router.navigateByUrl((0,l.Ms)("local"))}onNewBelt(){this.router.navigateByUrl((0,l.YB)("0"))}onBeltList(){this.router.navigateByUrl((0,l.lM)("local"))}onOpenUser(){this.router.navigateByUrl((0,l.sx)())}onGeneralCountList(){this.router.navigateByUrl((0,l.nH)("local"))}onNewGeneralCount(){this.router.navigateByUrl((0,l.hF)("0"))}onFetchUpdate(t){this.versionService.checked=!0,this.loadingService.showLoading(),this.databaseService.checkDatabaseVersion().then(r=>{this.versionService.checkLastVersion().subscribe({next:i=>{("new"===r?1:+r.values[0].number)<+i.data.number?this.confirmDialogService.presentAlert("Hay una nueva versi\xf3n del formulario de auditor\xedas. \xbfDesea actualizar?",()=>{this.versionService.getNewVersion().subscribe({next:u=>{let g="",o=0;u.data.sections.length>0?u.data.sections.forEach((s,v,h)=>{setTimeout(()=>{this.databaseService.executeQuery(`SELECT * FROM sections WHERE uid = "${s.uid}"`).subscribe({next:Z=>{Z!==f.W&&(g+=0===Z.values.length?`INSERT INTO sections (uid, name, subname, page, indx, status) VALUES ("${s.uid}", "${s.name}", "${s.subname}", ${s.page}, ${s.indx}, ${s.status}); `:`UPDATE sections SET uid = "${s.uid}", name = "${s.name}", subname = "${s.subname}", page = ${s.page}, indx = ${s.indx}, status = ${s.status} WHERE uid = "${s.uid}"; `,o++,o===h.length&&this.importQuestions(u.data.questions,g,+i.data.number))}})},50*v)}):this.importQuestions(u.data.questions,g,+i.data.number)},error:u=>this.httpResponseService.onError(u,"No se pudo recuperar la actualizaci\xf3n")})}):t?this.httpResponseService.onSuccess("La versi\xf3n m\xe1s reciente ya est\xe1 instalada"):this.loadingService.dismissLoading()},error:i=>this.httpResponseService.onError(i,"No se pudo recuperar")})}).catch(r=>this.httpResponseService.onError(r,"Error al verificar versi\xf3n local"))}}return n.\u0275fac=function(t){return new(t||n)(e.Y36(A.m),e.Y36($.J),e.Y36(H.k),e.Y36(T.F0),e.Y36(P),e.Y36(E.D),e.Y36(N.b),e.Y36(c.t4))},n.\u0275cmp=e.Xpm({type:n,selectors:[["app-home"]],decls:61,vars:3,consts:[[1,"center"],[1,"row","mt-2","mx-0"],[1,"col","text-end"],["id","click-trigger","size","small"],["slot","icon-only","name","person"],["trigger","click-trigger","triggerAction","click",3,"dismissOnSelect"],[1,"col-md-6","col-xl-12","mr-auto","mb-4","mt-4"],[1,"row"],[1,"col"],[1,"mt-2"],[3,"click"],["slot","icon-only","name","add-outline"],["fill","outline",3,"click",4,"ngIf"],["fill","outline",3,"click"],[1,"p-2","text-center"],["lines","none"],["button","",3,"click"],["color","primary","slot","end"]],template:function(t,r){1&t&&(e.TgZ(0,"ion-content",0)(1,"div",1)(2,"div",2)(3,"ion-button",3),e._UZ(4,"ion-icon",4),e.qZA(),e.TgZ(5,"ion-popover",5),e.YNc(6,x,11,0,"ng-template"),e.qZA()()(),e.TgZ(7,"div",6)(8,"h1"),e._uU(9,"M\xf3dulos"),e.qZA(),e.TgZ(10,"ion-card")(11,"ion-card-header")(12,"div",7)(13,"div",8)(14,"ion-card-title",9)(15,"strong"),e._uU(16,"Auditorias"),e.qZA()()(),e.TgZ(17,"div",2)(18,"ion-button",10),e.NdJ("click",function(){return r.onNewAuditory()}),e._UZ(19,"ion-icon",11),e.qZA(),e.YNc(20,k,2,0,"ion-button",12),e.YNc(21,L,4,1,"ion-button",12),e.qZA()()()(),e.TgZ(22,"ion-card")(23,"ion-card-header")(24,"div",7)(25,"div",8)(26,"ion-card-title",9)(27,"strong"),e._uU(28,"Uso de Casco"),e.qZA()()(),e.TgZ(29,"div",2)(30,"ion-button",10),e.NdJ("click",function(){return r.onNewHelmet()}),e._UZ(31,"ion-icon",11),e.qZA(),e.TgZ(32,"ion-button",13),e.NdJ("click",function(){return r.onHelmetList()}),e._uU(33,"Ver"),e.qZA()()()()(),e.TgZ(34,"ion-card")(35,"ion-card-header")(36,"div",7)(37,"div",8)(38,"ion-card-title",9)(39,"strong"),e._uU(40,"Uso de Cintur\xf3n"),e.qZA()()(),e.TgZ(41,"div",2)(42,"ion-button",10),e.NdJ("click",function(){return r.onNewBelt()}),e._UZ(43,"ion-icon",11),e.qZA(),e.TgZ(44,"ion-button",13),e.NdJ("click",function(){return r.onBeltList()}),e._uU(45,"Ver"),e.qZA()()()()(),e.TgZ(46,"ion-card")(47,"ion-card-header")(48,"div",7)(49,"div",8)(50,"ion-card-title",9)(51,"strong"),e._uU(52,"Conteo General"),e.qZA()()(),e.TgZ(53,"div",2)(54,"ion-button",10),e.NdJ("click",function(){return r.onNewGeneralCount()}),e._UZ(55,"ion-icon",11),e.qZA(),e.TgZ(56,"ion-button",13),e.NdJ("click",function(){return r.onGeneralCountList()}),e._uU(57,"Ver"),e.qZA()()()()()()(),e.TgZ(58,"ion-footer")(59,"div",14),e._uU(60," Puedes utilizar esta aplicaci\xf3n para cuatro prop\xf3sitos relacionados con seguridad vial en tu ciudad. "),e.qZA()()),2&t&&(e.xp6(5),e.Q6J("dismissOnSelect",!0),e.xp6(15),e.Q6J("ngIf",0===r.auditoriesCount),e.xp6(1),e.Q6J("ngIf",r.auditoriesCount>0))},dependencies:[_.O5,c.yp,c.YG,c.PM,c.Zi,c.Dq,c.W2,c.fr,c.gu,c.Ie,c.Q$,c.q_,c.d8],styles:["ion-button[_ngcontent-%COMP%]{text-transform:capitalize}.btn-right[_ngcontent-%COMP%]{float:right}ion-card[_ngcontent-%COMP%]{border-radius:8% 0% 9%;margin:15px}"]}),n})()}];let B=(()=>{class n{}return n.\u0275fac=function(t){return new(t||n)},n.\u0275mod=e.oAB({type:n}),n.\u0275inj=e.cJS({imports:[_.ez,S.u5,c.Pc,T.Bz.forChild(C)]}),n})()}}]);