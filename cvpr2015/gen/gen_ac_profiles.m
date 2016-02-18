fid = fopen('ac_profiles.php','w');

fprintf(fid, [...
  '<!DOCTYPE html>\n' ...
  '<html>\n', ...
  '<head>\n', ...
  '<title>CVPR 2015</title>\n', ...
  '</head>\n', ...
  '<body>\n']);

fprintf(fid, '<h2>CVPR 2015 Area Chair Information:</h2>\n');
fprintf(fid, '<table border="0" cellpadding="0">\n');

mm = csvread('input/ac_subject_areas.csv');

n_sa = size(mm,2);
n_ac = size(mm,1);

sa  = cell(1,n_sa+1); % special Action recognition area
fsa = fopen('input/subject_areas.txt');
for ii=1:n_sa
  sa{ii} = fgetl(fsa);
end
fclose(fsa);
sa(3:end) = sa(2:end-1);
sa{2}     = 'Action recognition';

mm   = [mm(:,1), zeros(n_ac,1), mm(:,2:end)];
n_sa = n_sa + 1;
mm(28,2) = 2; %% warning - hard-coded value

ac  = cell(3,n_ac);
fac = fopen('input/acs.txt');
for ii=1:n_ac
  ll = fgetl(fac);
  [ac{1,ii}, ll] = strtok(ll,char(9));
  [ac{2,ii}, ll] = strtok(ll,char(9));
  [ac{3,ii}, ll] = strtok(ll,char(9));
end
fclose(fac);

for ii=1:n_sa
  idx = find(mm(:,ii)==2);
  if(isempty(idx)), continue, end
  
  fprintf(fid, '<tr><td colspan="2"><br />');
  fprintf(fid, '<u>Primary Subject Area: ');
  fprintf(fid, '<b>%s</b></u></tr>\n', sa{ii});
  
  for jj=1:length(idx)
    aa = idx(jj);
    fprintf(fid, '<tr><td valign="top">&nbsp;&bull;&nbsp;');
    fprintf(fid, '<b><a href="%s" target="_blank">', ac{3,aa});
    fprintf(fid, '%s %s</a></b></td>\n', ac{1,aa}, ac{2,aa});
    
    fprintf(fid, '<td><u>Secondary Subject Area(s):</u><br />\n');
    fprintf(fid, '<i>');
    
    idx2 = find(mm(aa,:)==1);
    for kk=1:length(idx2);
      ss = idx2(kk);
      fprintf(fid, '%s<br />\n', sa{ss});
    end
    
    if(aa==20) %% warning - hard-coded value
      fprintf(fid, [...
        'Super-Resolution, Denoising, Deblurring<br />\n' ...
        'Patch-based methods<br />\n' ... 
        'Image/Video synthesis, Image/Video summaries<br />\n' ...
        'Video Analysis and Manipulation<br />\n' ...
        'Video Search/Retrieval<br />\n' ...
        'Graphics for Vision<br />\n']);
    end
    
    fprintf(fid, '</i><br /></td></tr>\n');
  end
end

fprintf(fid, '</table></body></html>\n');

fclose(fid);
