# удаляем старые файлы классов
#rm -rf ../generated/ru/ilb/workflow
# генерируем новые файлы классов
happymeal-1 xsd2code \
-m ru\\ilb \
-o ../generated \
-s ../../workflow-api/src/main/resources/schemas \
workflow/view.xsd