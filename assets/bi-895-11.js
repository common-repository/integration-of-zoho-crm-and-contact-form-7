var A=Object.defineProperty;var j=Object.getOwnPropertySymbols;var S=Object.prototype.hasOwnProperty,E=Object.prototype.propertyIsEnumerable;var v=(i,c,t)=>c in i?A(i,c,{enumerable:!0,configurable:!0,writable:!0,value:t}):i[c]=t,o=(i,c)=>{for(var t in c||(c={}))S.call(c,t)&&v(i,t,c[t]);if(j)for(var t of j(c))E.call(c,t)&&v(i,t,c[t]);return i};import{j as e,r as z}from"./index-1.0.6.js";import{_ as l,C as g}from"./bi-727-9.js";import{d as R,b as T}from"./bi-707-17.js";function k({size:i,className:c,clr:t="#0a8dff",style:n}){return e.jsx("div",{className:c,style:o({height:i,width:i},n),children:e.jsx("svg",{version:"1.1",style:{height:i,width:i},x:"0px",y:"0px",viewBox:"0 0 80 80",xmlSpace:"preserve",children:e.jsx("path",{fill:t,d:`M10,40c0,0,0-0.4,0-1.1c0-0.3,0-0.8,0-1.3c0-0.3,0-0.5,0-0.8c0-0.3,0.1-0.6,0.1-0.9c0.1-0.6,0.1-1.4,0.2-2.1
        c0.2-0.8,0.3-1.6,0.5-2.5c0.2-0.9,0.6-1.8,0.8-2.8c0.3-1,0.8-1.9,1.2-3c0.5-1,1.1-2,1.7-3.1c0.7-1,1.4-2.1,2.2-3.1
        c1.6-2.1,3.7-3.9,6-5.6c2.3-1.7,5-3,7.9-4.1c0.7-0.2,1.5-0.4,2.2-0.7c0.7-0.3,1.5-0.3,2.3-0.5c0.8-0.2,1.5-0.3,2.3-0.4l1.2-0.1
        l0.6-0.1l0.3,0l0.1,0l0.1,0l0,0c0.1,0-0.1,0,0.1,0c1.5,0,2.9-0.1,4.5,0.2c0.8,0.1,1.6,0.1,2.4,0.3c0.8,0.2,1.5,0.3,2.3,0.5
        c3,0.8,5.9,2,8.5,3.6c2.6,1.6,4.9,3.4,6.8,5.4c1,1,1.8,2.1,2.7,3.1c0.8,1.1,1.5,2.1,2.1,3.2c0.6,1.1,1.2,2.1,1.6,3.1
        c0.4,1,0.9,2,1.2,3c0.3,1,0.6,1.9,0.8,2.7c0.2,0.9,0.3,1.6,0.5,2.4c0.1,0.4,0.1,0.7,0.2,1c0,0.3,0.1,0.6,0.1,0.9
        c0.1,0.6,0.1,1,0.1,1.4C74,39.6,74,40,74,40c0.2,2.2-1.5,4.1-3.7,4.3s-4.1-1.5-4.3-3.7c0-0.1,0-0.2,0-0.3l0-0.4c0,0,0-0.3,0-0.9
        c0-0.3,0-0.7,0-1.1c0-0.2,0-0.5,0-0.7c0-0.2-0.1-0.5-0.1-0.8c-0.1-0.6-0.1-1.2-0.2-1.9c-0.1-0.7-0.3-1.4-0.4-2.2
        c-0.2-0.8-0.5-1.6-0.7-2.4c-0.3-0.8-0.7-1.7-1.1-2.6c-0.5-0.9-0.9-1.8-1.5-2.7c-0.6-0.9-1.2-1.8-1.9-2.7c-1.4-1.8-3.2-3.4-5.2-4.9
        c-2-1.5-4.4-2.7-6.9-3.6c-0.6-0.2-1.3-0.4-1.9-0.6c-0.7-0.2-1.3-0.3-1.9-0.4c-1.2-0.3-2.8-0.4-4.2-0.5l-2,0c-0.7,0-1.4,0.1-2.1,0.1
        c-0.7,0.1-1.4,0.1-2,0.3c-0.7,0.1-1.3,0.3-2,0.4c-2.6,0.7-5.2,1.7-7.5,3.1c-2.2,1.4-4.3,2.9-6,4.7c-0.9,0.8-1.6,1.8-2.4,2.7
        c-0.7,0.9-1.3,1.9-1.9,2.8c-0.5,1-1,1.9-1.4,2.8c-0.4,0.9-0.8,1.8-1,2.6c-0.3,0.9-0.5,1.6-0.7,2.4c-0.2,0.7-0.3,1.4-0.4,2.1
        c-0.1,0.3-0.1,0.6-0.2,0.9c0,0.3-0.1,0.6-0.1,0.8c0,0.5-0.1,0.9-0.1,1.3C10,39.6,10,40,10,40z`,children:e.jsx("animateTransform",{attributeType:"xml",attributeName:"transform",type:"rotate",from:"0 40 40",to:"360 40 40",dur:"0.6s",repeatCount:"indefinite"})})})})}function $({formID:i,crmConf:c,setCrmConf:t,step:n,setstep:N,isLoading:y,setisLoading:x,setSnackbar:s,redirectLocation:f,isInfo:a}){const[h,w]=z.useState(!1),[r,p]=z.useState({dataCenter:"",clientId:"",clientSecret:""}),C=()=>{N(2),!c.module&&T(i,c,t,x,s),document.querySelector(".btcd-s-wrp").scrollTop=0},d=m=>{const b=o({},c),u=o({},r);u[m.target.name]="",b[m.target.name]=m.target.value,p(u),t(b)};return e.jsxs("div",{className:"btcd-stp-page",style:{width:n===1&&900,height:n===1&&"100%"},children:[e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Integration Name:","bitcf7zc")})}),e.jsx("input",{className:"btcd-paper-inp w-6 mt-1",onChange:d,name:"name",value:c.name,type:"text",placeholder:l("Integration Name...","bitcf7zc"),disabled:a}),e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Data Center:","bitcf7zc")})}),e.jsxs("select",{onChange:d,name:"dataCenter",value:c.dataCenter,className:"btcd-paper-inp w-9 mt-1",disabled:a,children:[e.jsx("option",{value:"",children:l("--Select a data center--","bitcf7zc")}),e.jsx("option",{value:"com",children:"zoho.com"}),e.jsx("option",{value:"eu",children:"zoho.eu"}),e.jsx("option",{value:"com.cn",children:"zoho.com.cn"}),e.jsx("option",{value:"in",children:"zoho.in"}),e.jsx("option",{value:"com.au",children:"zoho.com.au"}),e.jsx("option",{value:"jp",children:"zoho.com.jp"})]}),e.jsx("div",{style:{color:"red"},children:r.dataCenter}),e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Homepage URL:","bitcf7zc")})}),e.jsx(g,{value:`${window.location.origin}`,setSnackbar:s,className:"field-key-cpy w-6 ml-0",readOnly:a}),e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Authorized Redirect URIs:","bitcf7zc")})}),e.jsx(g,{value:f||(bitcf7==null?void 0:bitcf7.redirect),setSnackbar:s,className:"field-key-cpy w-6 ml-0",readOnly:a}),e.jsxs("small",{className:"d-blk mt-5",children:[l("To get Client ID and SECRET , Please Visit","bitcf7zc")," ",e.jsx("a",{className:"btcd-link",href:`https://api-console.zoho.${(c==null?void 0:c.dataCenter)||"com"}/`,target:"_blank",rel:"noreferrer",children:l("Zoho API Console","bitcf7zc")})]}),e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Client id:","bitcf7zc")})}),e.jsx("input",{className:"btcd-paper-inp w-6 mt-1",onChange:d,name:"clientId",value:c.clientId,type:"text",placeholder:l("Client id...","bitcf7zc"),disabled:a}),e.jsx("div",{style:{color:"red"},children:r.clientId}),e.jsx("div",{className:"mt-3",children:e.jsx("b",{children:l("Client secret:","bitcf7zc")})}),e.jsx("input",{className:"btcd-paper-inp w-6 mt-1",onChange:d,name:"clientSecret",value:c.clientSecret,type:"text",placeholder:l("Client secret...","bitcf7zc"),disabled:a}),e.jsx("div",{style:{color:"red"},children:r.clientSecret}),!a&&e.jsxs(e.Fragment,{children:[e.jsxs("button",{onClick:()=>R(c,t,p,w,x,s),className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:h,children:[h?l("Authorized ✔","bitcf7zc"):l("Authorize","bitcf7zc"),y&&e.jsx(k,{size:"20",clr:"#022217",className:"ml-2"})]}),e.jsx("br",{}),e.jsxs("button",{onClick:C,className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",disabled:!h,children:[l("Next","bitcf7zc"),e.jsx("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})]})}export{$ as default};
