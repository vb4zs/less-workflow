## PHP Storm less file watcher's scope pattern

file:less//*&&!file:less//variables.less&&!file:less//variables*.less&&!file:less//*Variables.less&&!file:less//mixins.less&&!file:less//mixins*.less&&!file:less//*Mixins.less

## PHP Storm less file watcher's output path with macros

$ProjectFileDir$/css/$FileDirPathFromParent(less)$/$FileNameWithoutExtension$.css

## PHP Storm less file watcher's less command arguments

--no-color --line-numbers=mediaquery $FileName$