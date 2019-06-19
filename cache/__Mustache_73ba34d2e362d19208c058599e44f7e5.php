<?php

class __Mustache_73ba34d2e362d19208c058599e44f7e5 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>';
        $value = $this->resolveValue($context->find('titulo'), $context);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '<h3>Entrar</h3>
';
        $buffer .= $indent . '<form method="POST" action="login/entrar">
';
        $buffer .= $indent . '    <input type="text" name="login">
';
        $buffer .= $indent . '    <input type="password" name="senha">
';
        $buffer .= $indent . '    <button type="submit">Entrar</button>
';
        $buffer .= $indent . '</form>
';
        $buffer .= $indent . '
';

        return $buffer;
    }
}
