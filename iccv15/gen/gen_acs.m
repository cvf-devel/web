fid = fopen('raw_from_chairs/acs_reviewers.tsv');

l = fgetl(fid);

for ii=1:106
    l = fgetl(fid);
    if(~ischar(l)), break, end
    
    no_middle = false;
    if(sum(l(1:end-1)==char(9) & l(2:end)==char(9)))
        no_middle = true;
    end
    [fn,l] = strtok(l,char(9));
    if(no_middle)
        mn = '';
    else
        [mn,l] = strtok(l,char(9));
    end
    [ln,l] = strtok(l,char(9));
    [em,l] = strtok(l,char(9));
    [og,l] = strtok(l,char(9));
    [ul,l] = strtok(l,char(9));
    
    fprintf(...
        ['<li><a href="%s" target="_blank">%s %s %s</a>, ' ...
         '<span class="institution">%s</span></li>\n'], ...
            ul, fn, mn, ln, og);
end

fclose(fid);
