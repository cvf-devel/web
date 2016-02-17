fid = fopen('raw_from_chairs/acs_reviewers.tsv');

l = fgetl(fid);

for ii=1:106
    l = fgetl(fid);
    if(~ischar(l)), break, end
    
    no_middle = false;
    if(sum(l(1:end-1)==char(9) & l(2:end)==char(9)))
        no_middle = true;
    end
    [fn{ii},l] = strtok(l,char(9));
    if(no_middle)
        mn = '';
    else
        [mn,l] = strtok(l,char(9));
    end
    [ln{ii},l] = strtok(l,char(9));
    [em,l] = strtok(l,char(9));
    [og,l] = strtok(l,char(9));
    [ul{ii},l] = strtok(l,char(9));    
end

fclose(fid);



fid = fopen('ac_profiles.php','w');

fprintf(fid, [...
  '<!DOCTYPE html>\n' ...
  '<html>\n', ...
  '<head>\n', ...
  '<title>ICCV 2015</title>\n', ...
  '</head>\n', ...
  '<body>\n']);

fprintf(fid, '<h2>ICCV 2015 Area Chair Information:</h2>\n');
fprintf(fid, '<table border="0" cellpadding="0">\n');


acs        = cell(1000,6);
is_primary = zeros(1000,1);
idx        = 0;
facs = fopen('input/reviewer_subject_areas.tsv');
while(true)
  ll = fgetl(facs);
  if(~ischar(ll)), break, end

  idx = idx + 1;
  for ii=1:6
    [acs{idx,ii}, ll] = strtok(ll,char(9));
  end
  if(strcmp(acs{idx,6},'Primary'))
    is_primary(idx) = 1;
  end
end
fclose(facs);
acs        = acs(       1:idx,:);
is_primary = is_primary(1:idx,1);
is_primary = logical(is_primary);


areas = acs(is_primary,5);
areas = unique(areas);


for ii=1:length(areas)
  idx = cellfun(@(x) isequal(x,areas{ii}), acs(:,5));
  idx = find(idx & is_primary);
    
  fprintf(fid, '<tr><td colspan="2"><br />');
  fprintf(fid, '<u>Primary Subject Area: ');
  fprintf(fid, '<b>%s</b></u></tr>\n', areas{ii});
  
  for jj=1:length(idx)
    aa = idx(jj);
    
    % get google scholar url
    uu = cellfun(@(x) isequal(x(1:2),acs{aa,1}(1:2)), fn) & ...
	 cellfun(@(x) isequal(x,acs{aa,2}), ln);
    uu = find(uu);
    assert(isscalar(uu));
    uu = ul{uu};
    
    fprintf(fid, '<tr><td valign="top">&nbsp;&bull;&nbsp;');
    fprintf(fid, ['<b><a href="%s" target="_blank">%s %s</a>' ...
		  '</b><br />&nbsp&nbsp&nbsp%s</td>\n'], ...
	    uu, acs{aa,1}, acs{aa,2}, acs{aa,4});
        
    fprintf(fid, '<td><u>Secondary Subject Area(s):</u><br />\n');
    fprintf(fid, '<i>');

    bb = aa+1;
    while(bb <= size(acs,1) && ...
	  isequal(acs{aa,1},acs{bb,1}) && ...
	  isequal(acs{aa,2},acs{bb,2}))
      fprintf(fid, '%s<br />\n', acs{bb,5});
      bb = bb+1;
    end
    fprintf(fid, '</i><br /></td></tr>\n');
  end
end

fprintf(fid, '</table></body></html>\n');

fclose(fid);
