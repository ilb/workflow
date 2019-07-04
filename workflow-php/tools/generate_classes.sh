# удаляем старые файлы классов
rm -rf ../generated/at
rm -rf ../generated/org
# генерируем новые файлы классов (требуется проект happymeal путь
# trunk/happymeal или tags/…/happymeal в папке /home/username/work/happymeal)
~/work/happymeal/happymeal xsd2code \
-m at\\together\\_2006\\xpil1 \
-o ../generated \
-s ../../workflow-xpilapi/src/main/resources/schemas \
workflow/xpil.xsd
~/work/happymeal/happymeal xsd2code \
-m org\\wfmc\\_2002\\xpdl1 \
-o ../generated \
-s ../../workflow-xpilapi/src/main/resources/schemas \
workflow/xpdl.xsd
#дальше магия. как обычно применяем напильник с паяльником
sed -i -e 's/at\\together\\_2006\\xpil1\\XPIL/at\\together\\_2006\\xpil1/g;s/at\\together\\_2006\\xpil1\\XPDL/org\\wfmc\\_2002\\xpdl1/g;s/at\\\\together\\\\_2006\\\\xpil1\\\\XPIL/at\\\\together\\\\_2006\\\\xpil1/g;s/at\\\\together\\\\_2006\\\\xpil1\\\\XPDL/org\\\\wfmc\\\\_2002\\\\xpdl1/g' \
../generated/at/together/_2006/xpil1/XPIL/*.php
mv ../generated/at/together/_2006/xpil1/XPIL/* ../generated/at/together/_2006/xpil1
rm -rf ../generated/at/together/_2006/xpil1/XPIL
rm -rf ../generated/at/together/_2006/xpil1/XPDL
sed -i -e 's/org\\wfmc\\_2002\\xpdl1\\XPDL/org\\wfmc\\_2002\\xpdl1/g;s/org\\\\wfmc\\\\_2002\\\\xpdl1\\\\XPDL/org\\\\wfmc\\\\_2002\\\\xpdl1/g' \
../generated/org/wfmc/_2002/xpdl1/XPDL/*.php
mv ../generated/org/wfmc/_2002/xpdl1/XPDL/* ../generated/org/wfmc/_2002/xpdl1
rm -rf ../generated/org/wfmc/_2002/xpdl1/XPDL

