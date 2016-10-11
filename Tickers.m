%tickers1 = {'AAPL','AXP','BA','CAT','CSCO','CVX','KO','DD','XOM','GE','GS','HD','IBM','INTC','JNJ','JPM','MCD','MMM','MRK','MSFT','NKE','PFE','PG','TRV','UNH','UTX','V','VZ','WMT','DIS'}
[num,txt,raw]=xlsread('companylist.csv');
tickervals = txt(2:500,1);%up to 3145

FID=fopen('test.txt','w');
for i = 1:length(tickervals)
    full = strcat('https://api.robinhood.com/quotes/historicals/',tickervals(i),'/');
    full2=char(full);
    a = {urlread(full2,'Get',{'interval','month'})};
    fprintf(FID,'%s\r\n',a{:});
end
fclose(FID);
