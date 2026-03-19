# 📱 Guia de Implementação Geral
- Criei projeto no google cloud console;
- Api e serviços => biblioteca => Google Analytics Data API => ativar;
- IAM => contas de serviço => criar;
- Clica na conta de serviço criada => chaves => adicionar chave => baixar o json;
- Copiar email da conta de serviço criada;
- Vai no Analytics e cria um nova conta em Administrador => criar conta;
- Pega o id da propriedade (administrador => propriedade => detalhes);
- Pega o código que vai no site (que vai no header);
- Coloca o email copiado do serviço no analytics (admin => propriedade => ger acessos => add => add usuários => cola o email);
- Depois de estar no ar, no analytics vai aonde pega o cód do header e clica em testar;

OBS: nome do json é service-account-key.json;

https://gemini.google.com/app/8ca2ee3c78abb301




# 📱 Guia de Implementação - Rastreamento de Cliques WhatsApp
```javascript
/**
 * Função para rastrear cliques no WhatsApp
 * @param {string} localBotao - Identificador do local do botão (header, footer, flutuante, etc.)
 */
function trackWhatsAppClick(localBotao) {
    // Enviar evento para o Google Analytics
    if (typeof gtag !== 'undefined') {
        gtag('event', 'clique_whatsapp', {
            'event_category': 'engagement',
            'event_label': localBotao,
            'custom_parameter_1': 'whatsapp_contact'
        });
        
        // Log para debug (remova em produção se desejar)
        console.log('🟢 WhatsApp clicado:', localBotao);
    } else {
        console.warn('⚠️ Google Analytics não encontrado!');
    }
}
```

### **Passo 2: Modificar Botões do WhatsApp**
```html
<!-- ✅ BOTÃO NO CABEÇALHO -->
<a href="https://wa.me/5511999999999?text=Olá!" 
   target="_blank" 
   onclick="trackWhatsAppClick('header')">
    📱 WhatsApp
</a>

<!-- ✅ BOTÃO NO RODAPÉ -->
<a href="https://wa.me/5511999999999?text=Olá!" 
   target="_blank" 
   onclick="trackWhatsAppClick('footer')">
    💬 Fale Conosco
</a>

<!-- ✅ BOTÃO FLUTUANTE -->
<div class="whatsapp-flutuante" 
     onclick="trackWhatsAppClick('flutuante'); window.open('https://wa.me/5511999999999?text=Olá!', '_blank');">
    <i class="fab fa-whatsapp"></i>
</div>

<!-- ✅ BOTÃO EM PRODUTO -->
<button onclick="trackWhatsAppClick('produto'); window.open('https://wa.me/5511999999999?text=Interessado no produto X', '_blank');">
    💬 Comprar via WhatsApp
</button>

<!-- ✅ BOTÃO NA PÁGINA DE CONTATO -->
<a href="https://wa.me/5511999999999?text=Preciso de ajuda" 
   target="_blank" 
   onclick="trackWhatsAppClick('contato')">
    📞 Suporte WhatsApp
</a>
```
