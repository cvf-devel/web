mm = csvread('input/ac_subject_areas.csv');

n_sa = size(mm,2);
n_ac = size(mm,1);

ac  = cell(3,n_ac);
fac = fopen('input/acs.txt');
for ii=1:n_ac
  ll = fgetl(fac);
  [ac{1,ii}, ll] = strtok(ll,char(9));
  [ac{2,ii}, ll] = strtok(ll,char(9));
  [ac{3,ii}, ll] = strtok(ll,char(9));
end
fclose(fac);

aff = cell(1,n_ac);
fal = fopen('input/ac_affil.txt');
for ii=1:n_ac
  aff{ii} = fgetl(fal);
end

for ii=1:n_ac
  
fprintf('<tr>\n<td />\n');
fprintf('<td><a href="%s">%s %s</a></td>\n', ...
        ac{3, ii}, ac{1, ii}, ac{2, ii});
fprintf('<td>%s</td>\n</tr>\n', aff{ii});
end
