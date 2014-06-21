#include<iostream>
#include<vector>
#include<queue>
#include<cstdio>
#include<algorithm>
#define MAX 1000

using namespace std;

struct E
{
    int x, y, cost;

    bool operator < (const E &z) const
    {
        return cost > z.cost;
    }
};

struct D
{
    int currx, curry, currc;
    int prevx, prevy;
    int cost, difference;

    bool operator < (const D &z) const
    {
        return difference < z.difference;
    }
};

typedef struct E edges;
typedef struct D diff;


int tree[MAX][MAX];
int parent[MAX];
bool taken[MAX], found;
int src, des;
int  px, py, maximum;
int vertex, edge;
vector<edges> e1, e2;
vector<diff> d1;

int find(int r);
void find_difference(edges e);
void dfs(int u);

int main(void)
{
    freopen("input.txt", "r", stdin);

    priority_queue<edges> pq;
    cin >> vertex >> edge;

    for(int i=1; i<=edge; i++)
    {
        edges e;
        cin >> e.x >> e.y >> e.cost;
        pq.push(e);
    }

    for(int i=1; i<=vertex; i++)
        parent[i]=i;

    while(!pq.empty())
    {
        int u=pq.top().x;
        int v=pq.top().y;
        int ct=pq.top().cost;
        pq.pop();

        int a=find(u);
        int b=find(v);

        if(a!=b)
        {
            tree[u][v]=ct;
            tree[v][u]=ct;

            parent[a]=b;

            edges e;
            e.x=u;
            e.y=v;
            e.cost=ct;
            e1.push_back(e);
        }
        else
        {
            edges e;
            e.x=u;
            e.y=v;
            e.cost=ct;
            e2.push_back(e);
        }
    }

    for(int i=1; i<=vertex; i++)
    {
        cout << i << "->";
        for(int j=1; j<=vertex; j++)
            if(tree[i][j]) cout << j << " ";
        cout << endl;
    }

    cout << endl;

    for(int i=0; i<e2.size(); i++)
    {
        cout << "E2 = " << e2[i].x << " " << e2[i].y << " " << e2[i].cost << endl;;
        find_difference(e2[i]);
    }

    sort(d1.begin(), d1.end());

    int a=d1[0].prevx;
    int b=d1[0].prevy;
    int c=d1[0].currx;
    int d=d1[0].curry;
    int e=d1[0].currc;

    cout << endl;
    cout << "finally" << endl;

    cout << "px = " << a << endl;
    cout << "py = " << b << endl;
    cout << "cx = " << c << endl;
    cout << "cy = " << d << endl;

    tree[a][b]=0;
    tree[b][a]=0;
    tree[c][d]=e;
    tree[d][c]=e;

    for(int i=1; i<=vertex; i++)
    {
        cout << i << "->";
        for(int j=1; j<=vertex; j++)
            if(tree[i][j]) cout << j << " ";
        cout << endl;
    }

    return 0;
}

int find(int r)
{
    if(r==parent[r]) return r;
    else return parent[r]=find(parent[r]);
}

void find_difference(edges e)
{
    src=e.x;
    des=e.y;
    diff curr_d;
    curr_d.currx=src;
    curr_d.curry=des;

    for(int i=0; i<MAX; i++)
        taken[i]=false;
    maximum=0;
    found=false;
    dfs(src);

    cout << "px " << px << endl;
    cout << "py " << py << endl;
    cout << "maximum " << maximum << endl;

    curr_d.prevx=px;
    curr_d.prevy=py;
    curr_d.cost=e.cost;
    curr_d.difference=(e.cost-maximum);
    d1.push_back(curr_d);

    return;
}

void dfs(int u)
{
    int current, cx, cy;
    taken[u]=true;

    for(int i=1; i<=vertex; i++)
    {
        if(tree[u][i])
        {
            int v=i;
            int c=tree[u][i];

            if(!taken[v])
            {
                current=maximum;
                cx=px;
                cy=py;


                if(c>maximum)
                {
                    px=u;
                    py=v;
                    maximum=c;

                    cout << "in dfs" << endl;
                    cout << "Maximum " << maximum << endl;
                    cout << "px = " << px << endl;
                    cout << "py = " << py << endl;
                }

                if(v==des)
                {
                    cout << "I have found the des" << endl;
                    cout << maximum << endl;
                    for(int i=0; i<MAX; i++)
                        taken[i]=true;

                    found=true;
                    return;
                }
                else dfs(v);

                if(!found)
                {
                    maximum=current;
                    px=cx;
                    py=cy;
                }

                cout << "backtracking " << endl;
                cout << "Maximum " << maximum << endl;
                cout << "px = " << px << endl;
                cout << "py = " << py << endl;
            }
        }
    }
}
