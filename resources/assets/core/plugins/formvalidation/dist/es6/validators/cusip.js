export default function t(){return{validate(t){if(t.value===""){return{valid:true}}const e=t.value.toUpperCase();if(!/^[0123456789ABCDEFGHJKLMNPQRSTUVWXYZ*@#]{9}$/.test(e)){return{valid:false}}const r=e.split("");const a=r.pop();const n=r.map(t=>{const e=t.charCodeAt(0);switch(true){case t==="*":return 36;case t==="@":return 37;case t==="#":return 38;case e>="A".charCodeAt(0)&&e<="Z".charCodeAt(0):return e-"A".charCodeAt(0)+10;default:return parseInt(t,10)}});const c=n.map((t,e)=>{const r=e%2===0?t:2*t;return Math.floor(r/10)+r%10}).reduce((t,e)=>t+e,0);const o=(10-c%10)%10;return{valid:a===`${o}`}}}}