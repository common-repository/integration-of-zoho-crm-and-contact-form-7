var M=Object.defineProperty;var j=Object.getOwnPropertySymbols;var k=Object.prototype.hasOwnProperty,R=Object.prototype.propertyIsEnumerable;var v=(a,s,t)=>s in a?M(a,s,{enumerable:!0,configurable:!0,writable:!0,value:t}):a[s]=t,y=(a,s)=>{for(var t in s||(s={}))k.call(s,t)&&v(a,t,s[t]);if(j)for(var t of j(s))R.call(s,t)&&v(a,t,s[t]);return a};import{j as e,r}from"./index-1.0.6.js";import{u as _,b as F,a as Z,_ as C}from"./bi-727-9.js";import{a as z,Z as A,I as P,s as $}from"./bi-279-16.js";import E from"./bi-895-11.js";import{h as T,c as L}from"./bi-707-17.js";function q({step:a,active:s,className:t}){return e.jsx("div",{className:`d-in-b ${t}`,children:e.jsxs("div",{className:"flx flx-center",children:[Array(s).fill(0).map((i,o)=>e.jsxs(r.Fragment,{children:[e.jsx("div",{className:"btcd-stp flx flx-center stp-a  txt-center",children:o+1}),s-1!==o&&e.jsx("div",{className:"btcd-stp-line stp-line-a"})]},`stp-${o+21}`)),a-s!==0&&e.jsx("div",{className:"btcd-stp-line"}),Array(a-s).fill(0).map((i,o)=>e.jsxs(r.Fragment,{children:[e.jsx("div",{className:"btcd-stp flx flx-center txt-center",children:o+s+1}),a-s-1!==o&&e.jsx("div",{className:"btcd-stp-line "})]},`stp-${o+23}`))]})})}function O({formFields:a,setIntegration:s,integrations:t,allIntegURL:i}){const o=_(),{formID:l}=F(),[x,f]=r.useState(!1),[d,u]=r.useState(1),[N,c]=r.useState({show:!1}),[b,w]=r.useState(0),[n,h]=r.useState({name:"Zoho CRM API",type:"Zoho CRM",clientId:"",clientSecret:"",module:"",layout:"",field_map:[{formField:"",zohoFormField:""}],relatedlists:[],actions:{}});r.useEffect(()=>{window.opener&&z("zohoCRM")},[]);const S=()=>{$(l,t,s,i,n).then(p=>{var g;p.success?(c({show:!0,msg:(g=p.data)==null?void 0:g.msg}),o.push(i)):c({show:!0,msg:p.data||p})})},I=m=>{if(!L(n)){c({show:!0,msg:C("Please map mandatory fields","bitcf7zc")});return}n.module&&n.layout&&n.field_map.length>0&&u(m)};return document.querySelector(".btcd-s-wrp").scrollTop=0,e.jsxs("div",{children:[e.jsx(Z,{snack:N,setSnackbar:c}),e.jsx("div",{className:"txt-center w-9 mt-2",children:e.jsx(q,{step:3,active:d})}),e.jsx(E,{formID:l,crmConf:n,setCrmConf:h,step:d,setstep:u,isLoading:x,setisLoading:f,setSnackbar:c}),e.jsxs("div",{className:"btcd-stp-page",style:y({},d===2&&{width:900,height:"100%",overflow:"visible"}),children:[e.jsx(A,{tab:b,settab:w,formID:l,formFields:a,handleInput:m=>T(m,b,n,h,l,f,c),crmConf:n,setCrmConf:h,isLoading:x,setisLoading:f,setSnackbar:c}),e.jsxs("button",{onClick:()=>I(3),disabled:n.module===""||n.layout===""||n.field_map.length<1,className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",children:[C("Next","bitcf7zc")," "," ",e.jsx("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]}),e.jsx(P,{step:d,saveConfig:()=>S()})]})}export{O as default};
