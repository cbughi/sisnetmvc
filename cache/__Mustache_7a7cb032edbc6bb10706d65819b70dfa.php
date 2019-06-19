<?php

class __Mustache_7a7cb032edbc6bb10706d65819b70dfa extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>';
        $value = $this->resolveValue($context->find('titulo'), $context);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '<h3>Cadastrar alguma coisa</h3>
';
        $buffer .= $indent . '<form method="POST" action="teste/cadastrar">
';
        $buffer .= $indent . '    <input type="text" name="nome">
';
        $buffer .= $indent . '    <input type="text" name="sobrenome">
';
        $buffer .= $indent . '    <input type="text" name="email">
';
        $buffer .= $indent . '    <button type="submit">Enviar</button>
';
        $buffer .= $indent . '</form>
';
        $buffer .= $indent . '
';

        return $buffer;
    }
}
