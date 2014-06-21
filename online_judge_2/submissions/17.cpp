#include<iostream>
#include<vector>
#include<stack>
#include<queue>
#define max 100

using namespace std;

void print(void);

int main(void)
{
    int N,E,i,j;
    vector<int> edge[max], cost[max];
    cin >> N >> E;

    for(i=0; i<E; i++)
    {
        int n1, n2;
        char c;

        cin >> n1 >> n2 >> c;

        switch(c)
        {
            case 'o' :
                edge[n1].push_back(n2);
                cost[n1].push_back(1);
                break;
            case 'i' :
                edge[n2].push_back(n1);
                cost[n2].push_back(1);
                break;
        }
    }

    for(i=0; i<N; i++)
    {
        for(j=0; j<edge[i].size(); j++)
            cout << edge[i][j] << " ";
        cout << endl;
    }

    return 0;
}
