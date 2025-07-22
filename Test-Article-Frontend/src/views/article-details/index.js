import React, {useEffect, useState} from 'react'
import {Link, useParams} from 'react-router-dom'
import {_getArticleDetails, _getArticles} from "../../redux/actions/auth/index"
import {Button, Card, CardBody, CardHeader,
  CardTitle,
  CardText, Col, Container, Row, Media} from "reactstrap"
import AddModal from "./add-modal"
import {Plus, CornerUpLeft} from "react-feather"

function ArticleList() {
  const [article, setArticle] = useState([])
  const [selectedArticleModal, setSelectedArticleModal] = useState({data: null, show: false})
  const {articleId} = useParams()

  const refreshData = () => {
    _getArticleDetails(
      articleId,
      (res) => {
        console.log(res)
        setArticle(res.data.data.Article)
      }
    )
  }

  useEffect(() => {
    refreshData()
  }, [])

  return (
    <>
      <Container fluid={true}>
        <Row>
          <Col className={'d-flex justify-content-between align-items-center'}>
            <h2>Article</h2>
          </Col>
        </Row>
        <Row>
          <Col xs={12}>
            <Card>
              <CardBody>
                <Media>
                  <Media body>
                    <h3>{article.title}</h3>
                    <CardText>{new Date(article.created_at).toLocaleDateString()}</CardText>
                    <CardText>{article?.content}</CardText>
                  </Media>
                </Media>
              </CardBody>


            </Card>
          </Col>
        </Row>
        <Row>
          {
            article?.comments?.map((comment, index) => {
              return (
                <Col xs={12} key={index}>
                  <Card>
                    <CardBody>
                      <Media>
                        <Media body>
                          <h6 className='font-weight-bolder mb-25'>{comment.author_name}</h6>
                          <CardText>{new Date(comment.created_at).toLocaleDateString()}</CardText>
                          <CardText>{comment.content}</CardText>
                        </Media>
                      </Media>
                    </CardBody>
                  </Card>
                </Col>
              )
            })
          }
        </Row>
        <Row>
          <Col>
            <Button color={'primary'} className={'btn-icon'} onClick={() => { setSelectedArticleModal({data: null, show: true}) }} >
              <Plus />
              <span className={'ml-25'}>Add Comment</span>
            </Button>
          </Col>
        </Row>
      </Container>
      {
        selectedArticleModal.show ? <AddModal articleId={articleId} onClose={() => setSelectedArticleModal({show: false, data: null})} onSuccessCallback={refreshData} /> : null
      }
    </>
  )
}

export default ArticleList
